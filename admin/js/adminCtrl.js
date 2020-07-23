(()=>{
    moment.locale('es');

    
    let app = angular.module('adminApp', []);
    app.controller('adminCtrl',[ '$scope', '$http', ( $scope, $http )=>{
        $scope.partials = {
            login: "./partials/login.html",
            dashboard: "./partials/dashboard.html",
            modalCaso: "./partials/modal_caso.html",
            modalImg: "./partials/modalImg.html"
        };

        $scope.user = {
            username : null,
            password : null
        }

        $scope.case = {
            Nombre: null,
            Titulo: null,
            URL: null,
            Descripcion: null,
            Type: null,
            Visible: true,
            fileName: null,
            fileBody: null,
            fileSize: null,
        }

        $scope.cases = [];
        $scope.img = {};
        $scope.edit = false;

        $scope.caseOrg = angular.copy($scope.case);
        $scope.ordfields = {
            fields : [
                { label: 'Posición', value: 'Posicion' },
                { label: 'Título', value: 'Titulo' },
                { label: 'Imagen', value: 'Nombre' },
                { label: 'Descripción', value: 'Descripcion' },
            ],
            ord : 'Posicion',
            reverse : false,
        }

        $scope.sessionActive = false;

        let alerta = ( tipo, msg, cancel = false ) => {
            return Swal.fire({
                icon: tipo,
                text: msg,
                showCancelButton: cancel,
                cancelButtonText: 'Cancelar'
            });
        }
    
        const observer = {
            next: value => { $scope.sessionActive = false; $scope.$apply(); alerta('info', 'Tu sesión ha expirado'); },
            error: err => console.warn(error),
            complete: () => console.info('Complete')
    
        }
    
        let sesionactiva = {
            timer : null,
            subs : null,
            fechaHora : null
        }
    
        let getFecha = () => { return moment().add(15,'m').toDate() };
    
        let expiredSession = (init = false) => {
            console.log(':::IN expiredSession');
            !init ? sesionactiva.subs.unsubscribe() : console.log('Nueva sesión');
            sesionactiva.fechaHora = getFecha();
            sessionStorage.setItem('timestamp', moment(sesionactiva.fechaHora).valueOf());
            sesionactiva.timer = rxjs.timer(sesionactiva.fechaHora);
            sesionactiva.subs = sesionactiva.timer.subscribe(observer);
        }

        // $scope.init = () => {
        //     let sess = sessionStorage.getItem('timestamp');
        //     if(sess != null && sess != undefined){
        //         if( moment(parseInt(sess)) > moment() ){
        //             $scope.sessionActive = true;
        //         }
        //     }
        // } 
        
        $scope.logIn = async() => {
            console.log(':::IN LogIn');    
            Swal.showLoading();
            let resp = await $http.post('php/services/login.php', $scope.user);

            if( resp.data.err ){
                alerta( 'error', resp.data.mensaje );
            }else{
                $scope.sessionActive = true;
                $scope.user.password = null;
                $scope.getCases();
                expiredSession(true);
                Swal.close();
                $scope.$apply();
            }
            console.log(':::OUT LogIn');
        }

        $scope.logOut = () => {
            console.log(':::In logOut');
            $scope.sessionActive = false;
            sessionStorage.removeItem('timestamp');
            console.log(':::In logOut');
        }

        let eventoImage = ( e ) => {
            if( e.target.files.length > 0 ){
                $scope.case.fileName = e.target.files[0].name;
                console.log(e.target.files[0]);
                let read = new FileReader();
                let file = e.target.files[0];
    
                if( !file.type.includes('image') ){
                    alerta('error', 'El tipo de Archivo no es permitido.');
                    e.target.value = null;
                }else if( (file.size/1024) > 2048 ){
                    alerta('El tamaño del Archivo supera el límite permitido (2MB)');
                    e.target.value = null;
                }else{
                    read.readAsDataURL(file);
                    read.onload = (ev) => {
                        console.log(ev);
                        $scope.case.fileBody = ev.target.result.split(',')[1];
                        $scope.case.Type = file.type.split('/')[1];
                        $scope.case.fileSize = file.size;
                        $scope.$apply();
                    }
                }
            }else{
                e.target.value = null;
                $scope.case.fileName = null;
                $scope.$apply();
            }


        }

        $scope.caseCUModal = (edit = false, caso = undefined) => {
            expiredSession();
            $scope.edit = edit;
            if(caso != undefined){
                for (const p in caso) {
                    $scope.case[p] = caso[p];
                }
            }
            
            $('#modalCaso').modal('show');
            document.querySelector('#imagen').addEventListener('change', (event) => eventoImage(event) );
        }

        $scope.clearFields = () => {
            $scope.case = angular.copy($scope.caseOrg);
        }

        $scope.caseCU = async(edit) => {
            Swal.showLoading();
            expiredSession();
            $scope.case.URL = window.location.href + 'img/casos/' + $scope.case.Nombre + '.' + $scope.case.Type;
            $scope.case.Posicion = parseInt($scope.case.Posicion);
            console.log($scope.case);
            let resp = !edit ?  await $http.post('php/services/insertCase.php', $scope.case) :
                                await $http.post('php/services/updateCase.php', $scope.case);
            
            if(resp.data.error){
                if( resp.data.mensaje.includes("Duplicate") && resp.data.mensaje.includes("for key 'Nombre'") ){
                    alerta( 'error', "El nombre de archivo ingresado ya existe." );
                } else if( resp.data.mensaje.includes("Duplicate") && resp.data.mensaje.includes("for key 'Posicion'") ){
                    alerta( 'error', "El número de posición ingresado ya existe." );
                } else{
                    alerta( 'error', resp.data.mensaje );
                }
            }else{
                alerta( 'success', resp.data.mensaje ).then((val)=> {
                    if(val){
                        $scope.getCases();
                        $scope.clearFields();
                        $scope.$apply();
                        $('#modalCaso').modal('hide')
                    }
                });
            }
            console.log(resp);
        }

        $scope.getCases = async() => {
            let resp = await $http.get('php/services/listCases.php');

            $scope.cases = resp.data != null ? resp.data : [];
            
            if( $scope.cases.length > 0 ){
                for( caso of $scope.cases ){
                    caso.Visible = caso.Visible == '1' ? true : false;
                }
            }

            $scope.$apply();
        }

        $scope.rmCase = async( caso ) => {
            expiredSession();
            let valid = await alerta('warning', `¿Estas seguro que deseas eliminar el caso "${caso.Titulo}"`, true);
            if(valid.isConfirmed){
                let resp =  await $http.post('php/services/deleteCase.php', caso);
                if(resp.data.error){
                    alerta( 'error', resp.data.mensaje );
                }else{
                    $scope.getCases();
                    $scope.$apply();
                }
            }
        }

        $scope.imgShow = ( titulo, img ) => {
            expiredSession();
            $scope.img.titulo = titulo;
            $scope.img.url = img;
            $('#modalImg').modal('show');
        }

        $scope.onlyLetters = (obj) => {
            console.log(obj.keyCode);
            let validacion1 =   obj.keyCode >= 48 && obj.keyCode <= 57 ? true :
                                obj.keyCode >= 65 && obj.keyCode <= 90 ? true :
                                obj.keyCode >= 97 && obj.keyCode <= 122 ? true :
                                obj.keyCode == 95 ? true :
                                obj.keyCode == 45 ? true : false;
            obj = !validacion1 ? obj.preventDefault() : obj;
        }

        $scope.onlyNumbers = (obj) => {
            let validacion1 =  obj.keyCode >= 48 && obj.keyCode <= 57 ? true : false;
            obj = !validacion1 ? obj.preventDefault() : obj;
        }

        $scope.refreshTable = async() => {
            expiredSession();
            Swal.showLoading();
            await $scope.getCases();
            Swal.close();
        }

        $scope.noPaste = (obj) => {
            obj.preventDefault();
        }

        $scope.ordena = (field) => {
            $scope.ordfields.ord = field;
        }
    }]);

})();