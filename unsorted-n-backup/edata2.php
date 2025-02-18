<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    ?>
    <script>
        var ddv;
        $.extend($.fn.tabs.methods,{
        	disableTab: function(jq, which){
        		return jq.each(function(){
        			var tab = $(this).tabs('getTab', which).panel('options').tab;
        			tab.addClass('tabs-disabled').unbind('.tabs');
        			tab.find('a.tabs-close').unbind('.tabs');
        		});
        	},
        	enableTab: function(jq, which){
        		return jq.each(function(){
        			var target = this;
        			var panel = $(target).tabs('getTab', which);
        			var tab = panel.panel('options').tab;
        			tab.removeClass('tabs-disabled').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				$(target).tabs('select', index);
        			}).bind('contextmenu.tabs', {p:panel}, function(e){
        				var opts = $(target).tabs('options');
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				opts.onContextMenu.call(target, e, e.data.p.panel('options').title, index);
        			});
        			tab.find('a.tabs-close').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				$(target).tabs('close', index);
        				return false;
        			});
        		});
        	}
        });
        $.extend($.fn.combobox.defaults.inputEvents, {
			focus: function(e){
				var target = this;
				var len = $(target).val().length;
				setTimeout(function(){
					if (target.setSelectionRange){
						target.setSelectionRange(0, len);
					} else if (target.createTextRange){
						var range = target.createTextRange();
						range.collapse();
						range.moveEnd('character', len);
						range.moveStart('character', 0);
						range.select();
					}
				},0);
			}
		})   
        $.extend($.fn.validatebox.defaults.rules,{
        inList:{
                validator:function(value,param){
                        var c = $(param[0]);
                        var opts = c.combobox('options');
                        var data = c.combobox('getData');
                        var exists = false;
                        for(var i=0; i<data.length; i++){
                                if (value == data[i][opts.textField]){
                                    exists = true;
                                    break;
                                }
                        }
                        return exists;
                },
                message:'invalid value.'
            }
        });
    </script>

    <script type="text/javascript">                     
		function doSearchedata2(){
            $('#dgedata2').datagrid('load',{
				blthedata2cari: $('#blthedata2cari').datebox('getValue')
			});
		}
        function aksiedata2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1 && parseInt(row.jumlah_dataedata2)>0){
                var a = '<a href="javascript:void(0)" title="Kirim Data" onclick="kirimedata2(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-cloud-upload-alt" style="font-size:10px;"></i></button></a>';
                //var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyedata(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-cloud-upload-alt" style="font-size:10px;"></i></button></a>';
                //var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a;
        }  

        function onSelectprovinsiedata(){
            var nilai1 = $('#id_provinsiedata').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenedata').combobox('enable');
            $('#id_kabupatenedata').combobox('clear'); 
            $('#id_kabupatenedata').combobox('reload',url1);
    	}
        
        function file_exportnya(value,row,index){
            if(row.file_exportedata!==""){
                var a = '<a target="_blank" href="'+row.file_exportedata+'"><button class="easyui-linkbutton c1" title="File CSV" style="width:65px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;">CSV</button></a>';
            } else {
                var a = '';
            }            
            return a;
        }

		function styler1(value,row,index){
            //return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
            return 'padding-top:3px;padding-bottom:3px;';
		}
        
        $('#id_provinsiedata').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenedata').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsiedata').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function(e){
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function(v){
                        if (getRowIndex(target, v) >= 0){
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value){
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for(var i=0; i<data.length; i++){
                            if (data[i][opts.idField] == value){
                                return i;
                            }
                        }
                        return -1;
                    }
                }
            })
        });
        $('#id_kabupatenedata').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function(e){
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function(v){
                        if (getRowIndex(target, v) >= 0){
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value){
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for(var i=0; i<data.length; i++){
                            if (data[i][opts.idField] == value){
                                return i;
                            }
                        }
                        return -1;
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
    $(function(){
        $("#dgedata").datagrid({
        });
    });
    </script>
    <table id="dgedata2" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_edata2.php" pageSize="20"        
    		toolbar="#toolbaredata2" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="true" singleSelect="false"
            >
    	<thead>
    		<tr>
                <!--<th field="ck" checkbox="true" data-options="styler:styler1"></th>-->
                <th field="aksiedata2" width="80" align="center" halign="center" data-options="formatter:aksiedata2,styler:styler1">Aksi</th>
                <th field="nama_dataedata2" width="300" align="left" halign="left" data-options="styler:styler1">Jenis Data</th>
                <th field="jumlah_dataedata2" width="120" align="center" halign="center" data-options="styler:styler1">Jumlah<br/>Perubahan Data</th>
                <th field="url_apiedata2" width="400" align="left" halign="left" data-options="styler:styler1"></th>
                <!--
                <th field="blthedata" width="100" align="center" halign="center" data-options="styler:styler1">Bulan</th>
                <th field="tgl_exportedata" width="200" align="center" halign="center" data-options="styler:styler1">Tanggal Export</th>
                <th field="file_exportnya" width="80" align="center" halign="center" data-options="formatter:file_exportnya,styler:styler1">Hasil Export</th>
                <th field="nama_petugasedata" width="200" align="center" halign="center" data-options="styler:styler1">Diproses Oleh</th>
                -->
                </tr>
    	</thead>
    </table>
    <div id="toolbaredata2" style="background-color:#fff;padding:5px;">
    	<div id="tbedata2" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">BULAN</td>
                <td style="padding-right:10px;">
                    <input class="easyui-datebox" id="blthedata2cari" name="blthedata2cari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchedata2()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" plain="false" onclick="gettoken()" style="min-width:90px;">Get Token</a>
                </td>
            </tr>
            </table>
    	</div> 
        <div id="pesannya" style="width:100%;padding:5px">
        </div> 
    </div>
                
    <script>
        $('#dgedata2').datagrid({
            view: detailview,
            onDblClickRow:function(index,row){
                var expander = $(this).datagrid('getExpander', index);
                if (expander.hasClass('datagrid-row-expand')){
                    $(this).datagrid('expandRow',index);                        
                }else{
                    $(this).datagrid('collapseRow',index);
                } 
            },
            onLoadSuccess:function(){
                //$('#dggangguan').datagrid('expandRow',0);
            },            
            detailFormatter:function(index,row){
                return '<div style="padding:2px"><table class="ddv" style="max-height:300px;"></table></div>';
            },
            onExpandRow: function(index,row){   
                // alert(row.nama_tabeledata2+" "+row.blthedata2);
                ddv = $(this).datagrid('getRowDetail',index).find('table.ddv');
                ddv.datagrid({
                    url:'get_detail_edata2.php?nama_tabel='+row.nama_tabeledata2+'&blth='+row.blthedata2,
                    fitColumns:true,
                    singleSelect:true,
                    pagination:false,
                    nowrap:false,
                    pageSize:10,
                    rownumbers:false,
                    showFooter:false,
                    loadMsg:'',
                    maxHeight:'300px',
                    title:'',
                    columns:[[   
                        {field:'tgl_update_sapdedata2',title:'Tgl Update',width:120,align:'center',halign:'center',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        },
                        {field:'user_update_sapdedata2',title:'User Update',width:120,align:'center',halign:'center',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        },
                        {field:'nipedata2',title:'Nip Pegawai',width:100,align:'center',halign:'center',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        },
                        {field:'nama_dataedata2',title:'Jenis Data',width:120,align:'center',halign:'center',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        },
                        {field:'statusdedata2',title:'Status',width:120,align:'center',halign:'center',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        },
                        {field:'keterangandedata2',title:'Keterangan',width:350,align:'left',halign:'left',                                    
                            styler: function (value, row, index) {
                                return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
                            }
                        }
                    ]],
                    onResize:function(){
                        $('#dgedata2').datagrid('fixDetailRowHeight',index);
                    },
                    onLoadSuccess:function(){
                        setTimeout(function(){
                            $('#dgedata2').datagrid('fixDetailRowHeight',index);
                        },0);      
                    }
                });
                $('#dgedata2').datagrid('fixDetailRowHeight',index);
            }
        });        
    </script>
    
    <div id="dlgtemplateedata" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplateedata">
    	<form id="fmtemplateedata" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templateedata" name="file_templateedata" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplateedata">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplateedata()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplateedata').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgedata" class="easyui-dialog" modal="true" style="min-width:200px;min-height:80px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsedata">
    	<form id="fmedata" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:60px;">Label</td>
                <td><input class="easyui-textbox" id="labeledata" name="labeledata" missingMessage="Harus di isi" data-options="required:true" style="width: 400px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsedata">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saveedata()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgedata').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <script type="text/javascript">
    	function myformatter(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    	}
    	function myparser(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		var d = parseInt(ss[2],10);
    		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
    			return new Date(y,m-1,d);
    		} else {
    			return new Date();
    		}
    	}

    	function myformatter2(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		//return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    		return y+'-'+(m<10?('0'+m):m);
    	}
    	function myparser2(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		if (!isNaN(y) && !isNaN(m)){
    			return new Date(y,m-1);
    		} else {
    			return new Date();
    		}
    	}
    </script>
    
    <script type="text/javascript">
        var url;
        function gettoken(){
            $.messager.confirm('Konfirmasi','Proses request token?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses request token'});
                    $.post('updatedata/req_token.php',{},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        //$("#pesannya").html(result.resultMsg);
                        //$.messager.alert('Result',result.resultMsg,'info');
                        $.messager.alert({
                            title: 'Result',
                            msg: '<div style="max-height:300px;overflow:scroll;padding:10px;margin-top:0px;">'+result.resultMsg+'</div>',
                            icon: 'info',
                            width: 600,
                            height: 'auto',
	                        maxHeight: 480
                        });
                        //$('#dgedata2').datagrid('reload');
                        /*
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgedata').datagrid('reload');
                        }
                        */
                    },'json');
                }
            });  
        }

        function kirimedata2(index){
            var row = $('#dgedata2').datagrid('getRow', index);
    		if (row){
                //alert(row.url_apiedata2);
                // alert(row.urledata2);
                $.messager.confirm('Konfirmasi','Kirim data api HXMS?',function(r){
                    if (r){
                        // $.messager.progress({height:75, text:'Proses posting data...'});
                        // $.post('https://localhost/plnndcustom/updatedata/'+row.urledata2,{},function(result){
                        // $.post('https://36.64.235.218/plnndcustom/updatedata/'+row.urledata2,{},function(result){
                        //     $.messager.progress('close');
                        //     $('#dgedata2').datagrid('reload');
                        // },'json');
                        window.open("https://36.64.235.218/plnndcustom/updatedata/"+row.urledata2,"_blank");
                    }
                });
                 
                /*
                $('#dlgedata').dialog('open').dialog('setTitle','Update Data');
                $('#fmedata').form('clear');
    			$('#fmedata').form('load',row); 
                url = 'update_edata.php?id='+row.idedata;  
                */
            }          
        }        

    	function exportedata(){
            var blthnya = $("#blthedatacari").datebox('getValue');
            var jumlah2;
            var ids = [];
            var rows = $('#dgedata').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].id_edata);
            }
            var ids2 = ids.join(';');
            //alert(ids2);
            
    		if (jumlah>0){
    			$.messager.confirm('Konfirmasi','Export jenis data yang dipilih?',function(r){
    				if (r){
                        $.messager.progress({height:75, text:'Proses export data'});
    					$.post('proses_edata.php',{ids2:ids2,blth:blthnya},function(result){
                            //alert(result);
                            $.messager.progress('close');
    						if (result.errorMsg){
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						} else {
    							$('#dgedata').datagrid('reload');
    						}
    					},'json');
    				}
                });  
    		}
            
    	}
    
    	function addedata(){
    		$('#dlgedata').dialog('open').dialog('setTitle','Input Data');
    		$('#fmedata').form('clear');
    		url = 'save_edata.php';
    	}
    	function editedata(index){
            var row = $('#dgedata').datagrid('getRow', index);
    		if (row){
                $('#dlgedata').dialog('open').dialog('setTitle','Update Data');
                $('#fmedata').form('clear');
    			$('#fmedata').form('load',row); 
                url = 'update_edata.php?id='+row.idedata;  
            }          
    	}
    	function saveedata(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmedata').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgedata').dialog('close');
                        $('#dgedata').datagrid('reload');
                    }
                }
            });
    	}
    	function destroyedata(index){
            var row = $('#dgedata').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_edata.php',{id:row.idedata},function(result){
    						if (result.success){
    							$('#dgedata').datagrid('reload');	// reload the user data
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}

    	function uploadtemplateedata(){
    		$('#dlgtemplateedata').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplateedata').form('clear');
    		url = 'save_templateedata.php';
    	}
    	function savetemplateedata(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplateedata').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    //alert(result);
                    $.messager.progress('close');
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplateedata').dialog('close');
    					$('#dgedata').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgedata").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmuser{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:bold;
    		padding:5px 0;
    		margin-bottom:10px;
    		border-bottom:1px solid #ccc;
    	}
    	.fitem{
    		margin-bottom:5px;
    	}
    	.fitem label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitem input{
    		width:200px;
    	}
    </style>
<?php    
}
?>