Ext.define('ExtApp.store.Personagens', {
     extend: 'Ext.data.Store'
	,requires: ['Ext.data.Store', 'ExtApp.model.Personagem']
	,model: 'ExtApp.model.Personagem'
	,pageSize: 10
	,remoteFilter: true
	,proxy: {
		 type: 'ajax'
		,api: {
			read: 'php/ListarPersonagens.php'
		}
		,actionMethods: {
			read: 'POST'
		}
		,reader: {
              type: 'json'
			 ,root: 'data'
			 ,successProperty: 'success'
			 ,totalProperty: 'total'
         }
	}
});