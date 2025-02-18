<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if (!$userhris || $superadminhris!="1"){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    ?>
    <script type="text/javascript">   
		function doSearchdatamenu(){
            $('#dgdatamenu').datagrid('load',{
                grupdatamenucari: $('#grupdatamenucari').combobox('getValue'),
                parentIddatamenucari: $('#parentIddatamenucari').combobox('getValue'),
				parentId2datamenucari: $('#parentId2datamenucari').combobox('getValue'),
			});
		}

        function onSelectgrupcari(){
            var nilai1 = $('#grupdatamenucari').combobox('getValue');
            var url1 = 'get_menucari.php?grup='+nilai1;
            $('#parentIddatamenucari').combobox('enable');
            $('#parentIddatamenucari').combobox('clear'); 
            $('#parentIddatamenucari').combobox('reload',url1);
            $('#parentIddatamenucari').combobox('setValue',"");
    	}

        function onSelectmenucari(){
            var nilai1 = $('#parentIddatamenucari').combobox('getValue');
            var url1 = 'get_sub_menucari.php?id='+nilai1;
            $('#parentId2datamenucari').combobox('enable');
            $('#parentId2datamenucari').combobox('clear'); 
            $('#parentId2datamenucari').combobox('reload',url1);
            $('#parentId2datamenucari').combobox('setValue',"");
    	}

        function onSelectgrup(){
            var nilai1 = $('#grupdatamenu').combobox('getValue');
            var url1 = 'get_menucari.php?grup='+nilai1;            
            $('#parentIddatamenu').combobox('enable');
            $('#parentIddatamenu').combobox('clear'); 
            $('#parentIddatamenu').combobox('reload',url1);
            $('#parentIddatamenu').combobox('setValue',"");
    	}

        function onSelectmenu(){
            var nilai1 = $('#parentIddatamenu').combobox('getValue');
            var url1 = 'get_sub_menu.php?id='+nilai1;
            $('#parentId2datamenu').combobox('enable');
            $('#parentId2datamenu').combobox('clear'); 
            $('#parentId2datamenu').combobox('reload',url1);
            $('#parentId2datamenu').combobox('setValue',"");
    	}

        function onSelectgrup2(){
            var nilai1 = $('#grupdatamenu2').combobox('getValue');
            var url1 = 'get_menucari.php?grup='+nilai1;            
            $('#parentIddatamenu2').combobox('enable');
            $('#parentIddatamenu2').combobox('clear'); 
            $('#parentIddatamenu2').combobox('reload',url1);
            $('#parentIddatamenu2').combobox('setValue',"");
    	}

        function onSelectmenu2(){
            var nilai1 = $('#parentIddatamenu2').combobox('getValue');
            var url1 = 'get_sub_menu.php?id='+nilai1;
            $('#parentId2datamenu2').combobox('enable');
            $('#parentId2datamenu2').combobox('clear'); 
            $('#parentId2datamenu2').combobox('reload',url1);
            $('#parentId2datamenu2').combobox('setValue',"");
    	}

        function aksi(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update datamenu" onclick="editdatamenu(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
            var b = '<a href="javascript:void(0)" title="Hapus datamenu" onclick="destroydatamenu(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            return a+b;
        }  

    </script> 
    
    <script type="text/javascript">
    $(function(){
    });
    </script>
    <table id="dgdatamenu" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_datamenu.php" pageSize="20"        
    		toolbar="#toolbardatamenu" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksi" width="80" align="center" halign="center" data-options="formatter:aksi">AKSI</th>
                <th field="grupdatamenu" width="180" align="left" halign="center">GRUP</th>
    			<th field="nama_parentIddatamenu" width="180" align="left" halign="center">SUB MENU 1</th>
    			<th field="nama_parentId2datamenu" width="160" align="left" halign="center">SUB MENU 2</th>
    			<th field="nama_parentId3datamenu" width="200" align="left" halign="center">NAMA MENU</th>
    			<th field="icondatamenu" width="200" align="center" halign="center">IKON</th>
    			<th field="urldatamenu" width="190" align="center" halign="center">URL</th>
                <th field="statedatamenu" width="80" align="center" halign="center">STATE</th>
                <th field="urutdatamenu" width="50" align="center" halign="center">URUT</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbardatamenu" style="background-color:#ffffff;">
    	<div id="tbdatamenu" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">GRUP</td>
                <td style="padding-right:10px;">
                    <input class="easyui-combobox"
                        id="grupdatamenucari" editable="false"
                        name="grupdatamenucari" value=""
                        style="padding: 2px; width: 200px;" 
                        data-options="
                            onSelect:onSelectgrupcari,
                            url:'get_grupcari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'160px'
            		">
                </td>
                <td style="padding-right:5px;">MENU</td>
                <td style="padding-right:10px;">
                    <input class="easyui-combobox"
                        id="parentIddatamenucari" editable="false"
                        name="parentIddatamenucari" value=""
                        style="padding: 2px; width: 200px;" 
                        data-options="
                            onSelect:onSelectmenucari,
                            url:'get_menucari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
                <td style="padding-right:5px;">SUB MENU</td>
                <td style="padding-right:10px;">
                    <input class="easyui-combobox"
                        id="parentId2datamenucari" editable="false"
                        name="parentId2datamenucari" value=""
                        style="padding: 2px; width: 200px;" 
                        data-options="
                            url:'get_sub_menucari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchdatamenu()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adddatamenu()" style="min-width:90px;">Tambah Menu</a>
                </td>
            </tr>
            </table>
    	</div>        
    </div>
    
    <div id="dlgdatamenu" class="easyui-dialog" modal="true" style="min-width:300px;min-height:100px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdatamenu">
    	<form id="fmdatamenu" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="white-space:nowrap;">Grup</td>
                <td>
                    <input class="easyui-combobox"
                        id="grupdatamenu" editable="false"
                        name="grupdatamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="
                            onSelect:onSelectgrup,
                            url:'get_grupcari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'160px'
            		">
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Menu</td>
                <td>
                    <input class="easyui-combobox"
                        id="parentIddatamenu" editable="false"
                        name="parentIddatamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="
                            onSelect:onSelectmenu,
                            url:'get_menucari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Sub Menu</td>
                <td>
                    <input class="easyui-combobox"
                        id="parentId2datamenu" editable="false"
                        name="parentId2datamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Nama Menu</td>
                <td><input class="easyui-textbox" id="namadatamenu" name="namadatamenu" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Ikon Menu</td>
                <td><input class="easyui-textbox" id="icondatamenu" name="icondatamenu" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">URL Menu</td>
                <td><input class="easyui-textbox" id="urldatamenu" name="urldatamenu" missingMessage="Harus di isi" data-options="required:false" style="width: 300px;"></td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select id="statedatamenu" name="statedatamenu" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:false" style="width: 300px;">
                       <option value="">-</option>
                       <option value="closed">Close</option>
                       <option value="opened">Open</option>
                    </select>                            
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Urut</td>
                <td><input class="easyui-textbox" id="urutdatamenu" name="urutdatamenu" missingMessage="Harus di isi" data-options="required:false" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdatamenu">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savedatamenu()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdatamenu').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgdatamenu2" class="easyui-dialog" modal="true" style="min-width:300px;min-height:100px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdatamenu2">
    	<form id="fmdatamenu2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="white-space:nowrap;">Grup</td>
                <td>
                    <input class="easyui-combobox"
                        id="grupdatamenu2" editable="false"
                        name="grupdatamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="                            
                            url:'get_grupcari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <!--
            <tr>
                <td style="white-space:nowrap;">Menu</td>
                <td>
                    <input class="easyui-combobox"
                        id="parentIddatamenu2" editable="false"
                        name="parentIddatamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="
                            onSelect:onSelectmenu,
                            url:'get_menucari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Sub Menu</td>
                <td>
                    <input class="easyui-combobox"
                        id="parentId2datamenu2" editable="false"
                        name="parentId2datamenu" value=""
                        style="padding: 2px; width: 300px;" 
                        data-options="
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            -->
            <tr>
                <td style="white-space:nowrap;">Nama Menu</td>
                <td><input class="easyui-textbox" id="namadatamenu" name="namadatamenu" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Ikon Menu</td>
                <td><input class="easyui-textbox" id="icondatamenu" name="icondatamenu" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">URL Menu</td>
                <td><input class="easyui-textbox" id="urldatamenu" name="urldatamenu" missingMessage="Harus di isi" data-options="required:false" style="width: 300px;"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select id="statedatamenu" name="statedatamenu" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 300px;">
                       <option value="">-</option>
                       <option value="closed">Close</option>
                       <option value="opened">Open</option>
                    </select>                            
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Urut</td>
                <td><input class="easyui-textbox" id="urutdatamenu" name="urutdatamenu" missingMessage="Harus di isi" data-options="required:false" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdatamenu2">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savedatamenu2()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdatamenu2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <script type="text/javascript">
    	var url;
    	function adddatamenu(){
    		$('#dlgdatamenu').dialog('open').dialog('setTitle','Tambah Menu');
            $('#fmdatamenu').form('clear');
            $("#parentIddatamenu").combobox('reload','get_menucari.php');
    		url = 'save_datamenu.php';
    	}
    	function editdatamenu(index){
            var row = $('#dgdatamenu').datagrid('getRow', index);
    		if (row){
                //alert(row.grupdatamenu);
                $('#dlgdatamenu2').dialog('open').dialog('setTitle','Update Menu');
                $('#fmdatamenu2').form('clear');
                $('#fmdatamenu2').form('load',row);  
                $('#parentId2datamenu2').combobox('reload','get_menucari.php?grup='+row.grupdatamenu);
                url = 'update_datamenu.php?id='+row.iddatamenu;          
            }          
    	}
    	function savedatamenu(){
    		$('#fmdatamenu').form('submit',{
    			url: url,
    			onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
    			},
    			success: function(result){
                    //alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgdatamenu').dialog('close');		// close the dialog
    					$('#dgdatamenu').datagrid('reload');	// reload the user data
                        $("#tt2").tree('reload'); 
                        $("#parentIddatamenucari").combobox('reload','get_menucari.php');                       
    				}
    			}
    		});
    	}
    	function savedatamenu2(){
    		$('#fmdatamenu2').form('submit',{
    			url: url,
    			onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
    			},
    			success: function(result){
                    //alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgdatamenu2').dialog('close');		// close the dialog
    					$('#dgdatamenu').datagrid('reload');	// reload the user data
                        $("#tt2").tree('reload'); 
    				}
    			}
    		});
    	}
    	function destroydatamenu(index){
            var row = $('#dgdatamenu').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus menu ini?',function(r){
    				if (r){
    					$.post('destroy_datamenu.php',{id:row.iddatamenu},function(result){
    						if (result.success){
    							$('#dgdatamenu').datagrid('reload'); 
                                $("#tt2").tree('reload');                                
    						} else {
    							$.messager.show({	// show error message
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}
        //$("#dguser").height($(window).height() - 0);
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