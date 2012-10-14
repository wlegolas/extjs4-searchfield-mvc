Ext.Loader.setConfig({
	 enabled: true
});
Ext.Loader.setPath('Ext', 'extjs/scr');
Ext.Loader.setPath('Ext.ux', 'extjs/ux');

Ext.application({
     name: 'ExtApp'
    ,appFolder: 'app'
    ,controllers: [ 'Pages', 'Personagens' ]
	,autoCreateViewport : true
});