Ext.define('ExtApp.view.Viewport', {
     extend: 'Ext.container.Viewport'
    ,requires: [
        'Ext.container.Viewport',
        'Ext.layout.container.Border',
        'Ext.panel.Panel'
    ]
    ,itemId: 'viewport-principal'
    ,layout: 'border'
    ,items: [{
         region: 'north'
        ,xtype: 'pageheader'
    }, {
         region: 'center'
        ,margin: '1 0 0 0'
        ,border: false
        ,itemId: 'center-panel'
        ,layout: 'fit'
        ,items: [{
             xtype: 'personagemlist'
        }]
    }]
});