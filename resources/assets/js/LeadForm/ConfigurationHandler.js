let ConfigurationHandler = function() {
    return {
        init: function(){
            DevicesHandler.init();
            KdsHandler.init();
            PmsHandler.init();
            PosExternalHandler.init();
            PosHandler.init();
            SoftsHandler.init();
            ErpHandler.init();
            PropertySpacesHandler.init();
        }
    }
}();