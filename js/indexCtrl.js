(()=>{    
    let app = angular.module('ppsApp', []);
    app.controller('ppsCtrl',[ '$scope', '$http', ( $scope, $http )=>{
        let sizes = {
            xs: 575,
            sm: 767,
            md: 991,
            lg: 1199
        };
        $scope.seccioncasos = "./parciales/casos.html";
        $scope.tamanio = window.innerWidth;
        $scope.tamanioCard = 0;
        $scope.tamaniodMax = 0;
        $scope.cases = [];
        $scope.caso = null;

        let validaTamanio = () => {
            $scope.tamanioCard =    $scope.tamanio <= sizes.xs ? 320 :
                                    $scope.tamanio > sizes.xs && $scope.tamanio <= sizes.sm ? 520 :
                                    $scope.tamanio > sizes.sm && $scope.tamanio <= sizes.lg ? 450 : 450;
            
            $scope.tamaniodMax =    ($scope.tamanioCard/3) * 2;

            if($scope.cases.length > 0){
                $scope.cases.forEach(elem => {
                    elem.DescShort = elem.Descripcion.length <= 40 ? elem.Descripcion : 
                                    elem.Descripcion.length > 40 && $scope.tamanio <= sizes.xs ? elem.Descripcion.substring(0,40).trim() + '...' : 
                                    elem.Descripcion.length > 60 && $scope.tamanio > sizes.xs && $scope.tamanio <= sizes.sm ? elem.Descripcion.substring(0,60).trim() + '...' : 
                                    elem.Descripcion.substring(0,95).trim() + '...';
                });
            }

        }

        $scope.getCases = async() => {
            let resp = await $http.get('./php/getCasos.php');

            $scope.cases = resp.data != null ? resp.data : [];
            
            if( $scope.cases.length > 0 ){
                for( caso of $scope.cases ){
                    caso['DescShort'] = caso.Descripcion; 
                }
            }
            validaTamanio();
            $scope.$apply();
        }

        
        $(window).resize(function() 
        {   
            $scope.tamanio = window.innerWidth;
            validaTamanio();
            $scope.$apply();
        });

        $scope.openModal = (caso) => {
            $scope.caso = caso;
            $scope.caso['DescripcionTemp'] = $scope.caso.Descripcion.split('\n');
            $('#modalCaso').modal('show');
        }

        $scope.getCases();
    }]);

})();