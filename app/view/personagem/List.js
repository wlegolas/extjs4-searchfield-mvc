Ext.define('ExtApp.view.personagem.List',{
     extend: 'Ext.grid.Panel'
    ,requires: [
        'Ext.grid.Panel',
        'Ext.grid.RowNumberer',
        'Ext.toolbar.Toolbar',
        'Ext.toolbar.Paging',
        'Ext.ux.form.SearchField'
    ]
    ,alias : 'widget.personagemlist'
    ,store: 'Personagens'
    /**
     * @override
     * Método que irá inicializar o componente
     */
    ,initComponent: function() {
        var me = this;
        
        if (Ext.isString(me.store)) {
            me.store = Ext.create('ExtApp.store.Personagens');
        }
        
        // Aplicando as demais configurações na Classe
        Ext.apply(me, {
             title : 'Lista dos Personagens'
            ,columns: [
                 { xtype: 'rownumberer' }
                ,{ header: 'Nome'   ,dataIndex: 'nome'  ,flex: 2 }
                ,{ header: 'Clã'    ,dataIndex: 'cla'   ,flex: 1 }
                ,{ header: 'Nível'  ,dataIndex: 'nivel' ,flex: 1 }
                ,{ header: 'Vila'   ,dataIndex: 'vila'  ,flex: 1 }
            ]
            ,viewConfig: {
                emptyText: 'Não há registros a serem exibidos'
            }
            ,dockedItems: [{
                 dock: 'top'
                ,xtype: 'toolbar'
                ,items: [{
                     fieldLabel: 'Pesquisar pelo nome'
                    ,labelWidth: 110
                    ,flex: 1
                    ,xtype: 'searchfield'
                    ,store: me.store
                    ,paramName: 'filter'
                }]
            }, {
                 xtype: 'pagingtoolbar'
                ,store: me.store
                ,dock: 'bottom'
                ,displayInfo: true
                ,emptyMsg: 'Não há registros a serem exibidos'
                ,displayMsg: 'Exibindo {0} - {1} de {2} registro(s)'
            }]
        });
        
        me.callParent(arguments);
        
        // Carregando os dados do Store
        me.store.load();
    }
});