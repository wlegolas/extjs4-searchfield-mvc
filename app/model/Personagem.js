Ext.define('ExtApp.model.Personagem', {
     extend: 'Ext.data.Model'
    ,requires: ['Ext.data.Model']
    ,fields: [
         { name: 'id'   ,type: 'int' }
        ,{ name: 'nome' ,type: 'string' }
        ,{ name: 'cla'  ,type: 'string' }
        ,{ name: 'nivel'    ,type: 'string' }
        ,{ name: 'vila' ,type: 'string' }
    ]
});