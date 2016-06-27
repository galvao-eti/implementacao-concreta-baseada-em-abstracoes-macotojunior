<script type="text/javascript" src="public/assets/js/ext-all.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="public/assets/css/theme-triton/resources/theme-triton-all.css" />

<script type="text/javascript">

    Ext.onReady(function () {

        var self = this;

        this.delete = function (rowIndex) {
            
            self.view.getEl().mask('Aguarde...');

            Ext.Ajax.request({
                url: 'index.php?acao=delete',
                method: 'POST',
                params: self.grid.store.getAt(rowIndex).data,
                success: function (response) {

                    self.view.getEl().unmask();
                    Ext.Msg.alert('Status', 'Registro Removido.');
                    self.form.getForm().reset(true);
                    self.store.reload();


                },
                failure: function (response) {
                    self.view.getEl().unmask();
                    Ext.Msg.alert('Status', 'Falha na Requisição');

                }
            });

        };

        this.save = function () {
            
            self.view.getEl().mask('Aguarde...');
            
            var url;
            
            if (self.form.getRecord()) {
                url = 'index.php?acao=update';
            } else {
                url = 'index.php?acao=create';
            }
            
            self.form.getForm().submit({
                url: url,
                success: function (form, action) {
                    self.store.reload();
                    self.form.getForm().reset(true);
                    self.view.getEl().unmask();
                    Ext.Msg.alert('Sucesso', action.result.msg);
                },
                failure: function (form, action) {
                    self.view.getEl().unmask();
                    Ext.Msg.alert('Falha', 'Ocorreu um erro ao gravar os dados');
                }
            });
            
        };


        self.form = Ext.create('Ext.form.Panel', {
            region: 'north',
            autoHeight: true,
            bodyPadding: 10,
            xtype: 'form',
            items: [
                {
                    xtype: 'hidden',
                    name: 'id'
                },
                {
                    xtype: 'textfield',
                    name: 'nome',
                    msgTarget: 'under',
                    allowBlank: false,
                    width: '100%',
                    fieldLabel: 'Descrição',
                    blankText: 'Campo Obrigatório'
                },
                {
                    xtype: 'numberfield',
                    name: 'preco',
                    msgTarget: 'under',
                    allowBlank: false,
                    width: '100%',
                    fieldLabel: 'Preço',
                    blankText: 'Campo Obrigatório'
                }
            ],
            buttons: [
                {
                    text: 'Salvar',
                    handler: function () {
                        if (self.form.isValid()) {

                            self.save();

                        }
                    }
                },
                {
                    text: 'Novo',
                    handler: function () {
                        self.form.getForm().reset(true);
                    }
                }
            ]
        });

        self.store = Ext.create('Ext.data.Store', {
            fields: ['nome', 'preco', 'id'],
            proxy: {
                type: 'ajax',
                url: 'index.php?acao=retrieve',
                reader: {
                    type: 'json'
                }
            },
            autoLoad: true
        });


        self.grid = Ext.create('Ext.grid.Panel', {
            region: 'center',
            store: self.store,
            columns: [
                {
                    text: 'Produto',
                    flex: 1,
                    dataIndex: 'nome'
                },
                {
                    text: 'Preço',
                    dataIndex: 'preco',
                    width: 200
                }, {
                    xtype: 'actioncolumn',
                    width: 50,
                    items: [{
                            icon: 'public/assets/img/delete.png', // Use a URL in the icon config
                            tooltip: 'Remover',
                            handler: function (grid, rowIndex, colIndex) {
                                self.delete(rowIndex);
                            }
                        }]
                }
            ],
            listeners: {
                select: function (grid, record) {
                    self.form.loadRecord(record);
                }
            }
        });


        self.view = Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: [{
                    title: 'CRUD',
                    layout: 'border',
                    items: [
                        self.form,
                        self.grid
                    ]
                }]
        });
    });



</script>