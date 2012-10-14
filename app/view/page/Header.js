Ext.define('ExtApp.view.page.Header',{
     extend: 'Ext.toolbar.Toolbar'
	,requires: ['Ext.toolbar.Toolbar', 'Ext.Component']
    ,alias: 'widget.pageheader'    
    ,ui: 'sencha'
    ,height: 45
    ,items: [{
		 xtype: 'component'
		,cls  : 'app-text-title'
		,html : 'Exemplo: Utilizando Searchfield com MVC'
	}]
});
