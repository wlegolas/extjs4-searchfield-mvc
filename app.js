Ext.Loader.setConfig({
     enabled: true
    ,paths: {
         'Ext': 'extjs/scr'
        ,'Ext.ux': 'extjs/ux'
    }
});

Ext.application({
     name: 'ExtApp'
    ,appFolder: 'app'
    ,controllers: [ 'Pages', 'Personagens' ]
    ,autoCreateViewport : true
});