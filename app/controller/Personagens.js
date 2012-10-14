Ext.define('ExtApp.controller.Personagens', {
     extend: 'Ext.app.Controller'
	,require: ['Ext.app.Controller']
	,models: ['Personagem']
	,stores: ['Personagens']
	,views: ['personagem.List']
});