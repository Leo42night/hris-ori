<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || $superadminhris!="1"){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    ?>
    <script type="text/javascript">                     
		function doSearchuser(){
            $('#dguser').datagrid('load',{
				namausercari: $('#namausercari').textbox('getValue')
			});
		}
        function aksiuser(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update User" onclick="edituser(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
            var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyuser(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            var c = '<a href="javascript:void(0)" title="Reset Password" onclick="resetpass(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;"><i class="fa fa-lock" style="font-size:10px;"></i></button></a>';
            var d = '<a href="javascript:void(0)" title="Pengaturan Akses" onclick="settinguser(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:95px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;">AKSES</button></a>';
            return a+b+c+"<br/>"+d;
        }  

        function namanya(value,row,index){
            var a = row.user_fullnameuser;
            var b = '<span style="color:#337ab7;">'+row.jabatanuser+'</span>';
            return a+"<br/>"+b;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
    </script> 
    
    <script type="text/javascript">
    $(function(){
        $("#dguser").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
        $('#ttd2user').filebox({
            buttonText: 'Pilih File',
            buttonAlign: 'left'
        })        
    });
    </script>
    <table id="dguser" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_user.php" pageSize="20"        
    		toolbar="#toolbaruser" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksiuser" width="110" align="center" halign="center" data-options="formatter:aksiuser,styler:styler1">AKSI</th>
    			<th field="user_nameuser" width="140" align="center" halign="center" data-options="styler:styler1">USERNAME</th>
    			<th field="namanya" width="200" align="center" halign="center" data-options="formatter:namanya,styler:styler1">NAMA PENGGUNA<br/>JABATAN</th>
    			<th field="level_aksesuser" width="250" align="left" halign="center" data-options="styler:styler1">LEVEL AKSES</th>
    			<th field="status2user" width="100" align="center" halign="center" data-options="styler:styler1">STATUS</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbaruser" style="background-color:#fff;">
    	<div id="tbuser" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namausercari" name="namausercari" data-options="required:false,prompt:'nama'" style="width: 200px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchuser()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adduser()" style="min-width:90px;">Tambah User</a>
                </td>
            </tr>
            </table>
    	</div>        
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addUser()" style="min-width:90px;">Input Pengguna</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-minus-circle" plain="false" onclick="destroyUser()" style="min-width:90px;">Hapus Data</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c7" iconCls="fa fa-lock" plain="false" onclick="resetPass()" style="min-width:90px;color:white;">Reset Password</a>
        &nbsp;|&nbsp;<i style="">Keterangan : klik 2x untuk melakukan edit data</i>
        -->
    </div>
    
    <div id="dlguser" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsuser">
    	<form id="fmuser" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input id="keterangan" type="hidden">
            <div id="divuser">
            <table>
            <tr>
                <td style="width:90px;">Username</td>
                <td><input class="easyui-textbox" id="user_nameuser" name="user_nameuser" missingMessage="Harus di isi" data-options="required:true" style="width: 400px;" readonly></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="easyui-textbox" id="user_passuser" name="user_passuser" missingMessage="Harus di isi" data-options="required:true" style="width: 400px;" readonly></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <span style="color:red;">*) Password harus terdiri dari huruf besar, kecil, angka dan <br/>karakter khusus, dengan jumlah karakter 8-30</span>
                </td>
            </tr>
            </table>
            </div>
            <table>
            <tr>
                <td style="width:90px;vertical-align:top;padding-top:5px;">Hak Akses</td>
                <td style="vertical-align:top;padding-top:5px;">
                    <div style="margin-bottom:5px">
                        <input type="checkbox" id="superadmin" name="superadmin" value="1">
                        <label for="superadmin" class="textbox-label">Super Admin</label>
                    </div>     
                </td>
            </tr>
            <tr>
                <td style="">Nama</td>
                <td><input class="easyui-textbox" name="user_fullnameuser" data-options="required:true" style="width: 400px;"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="easyui-textbox" name="user_emailuser" data-options="required:false" style="width: 400px;"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td><input class="easyui-textbox" name="jabatanuser" data-options="required:false" style="width: 400px;"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select id="statususer" name="statususer" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 400px;">
                       <option value="1">AKTIF</option>
                       <option value="0" selected>NON AKTIF</option>
                    </select>                            
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsuser">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saveuser()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlguser').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgreset" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsreset">
    	<form id="fmreset" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:130px;">New Password</td>
                <td><input class="easyui-textbox" id="newpassworduser" name="newpassworduser" missingMessage="Harus di isi" data-options="required:true" style="width: 400px;"></td>
            </tr>
            <tr>
                <td style="width:130px;"></td>
                <td><span style="font-size:9px;color:red;">*) Password minimal 8 karakter, terdiri dari huruf besa, huruf kecil, angka dan karakter khusus.</span></td>
            </tr>
            <!-- <tr>
                <td style="width:130px;"></td>
                <td>
                    <span>Generate Password : </span><br/><br/>
                    <a href="javascript:void(0)"class="easyui-linkbutton c6" iconCls="fa fa-lock" onclick="generatePass()" style="min-width:90px">Generate</a>
                </td>
            </tr> -->
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsreset">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c5" iconCls="fa fa-save" onclick="savereset()" style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgreset').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <script type="text/javascript">
    	var url;
    	function adduser(){
    		$('#dlguser').dialog('open').dialog('setTitle','Data User Baru');
    		$('#fmuser').form('clear');
            $('#keterangan').val('input');
            //$('#user_name').textbox('enable');
            //$('#user_pass').textbox('enable');
            $("#divuser").show();
            $('#user_nameuser').textbox('readonly',false);
            $('#user_passuser').textbox('readonly',false);
            $('#user_nameuser').textbox({required:'true'});
            $('#user_passuser').textbox({required:'true'});
            $('#user_passuser').textbox({type: 'text'});
            //$('#kd_unit').combobox('disable');
    		url = 'save_user.php?id=0';
    	}
    	function edituser(index){
            var row = $('#dguser').datagrid('getRow', index);
    		if (row){
                $('#dlguser').dialog('open').dialog('setTitle','Edit Data User');
                $('#fmuser').form('clear');
    			$('#fmuser').form('load',row);      
                $('#keterangan').val('update'); 
                url = 'update_user.php?id='+row.iduser;  
                $("#divuser").show();   
                //$('#kd_areauser').combobox('reload','get_area2.php?kd_wilayah='+row.kd_wilayahuser);
                //$('#kd_areauser').combobox('reload','get_area2.php?kd_wilayah='+row.kd_wilayahuser);
                $('#user_nameuser').textbox('readonly',true);
                $('#user_passuser').textbox('readonly',true);
                $('#user_nameuser').textbox({required:'false'});
                $('#user_passuser').textbox({required:'false'});
                $('#user_passuser').textbox({type: 'password'});
    			url = 'update_user.php?id='+row.iduser;
                //$('#lblttduser').text("Nama file : "+row.ttduser);
            }          
    	}
    	function saveuser(){
            var keterangan = $('#keterangan').val();
            var nilai1 = $('#user_passuser').textbox('getValue');
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,30}$/;
            //if(nilai1.match(decimal) || keterangan==="update"){            
            if(keterangan!=="update"){                
                if(nilai1.match(decimal)){
                    $.messager.progress({height:75, text:'Proses simpan data...'});
                    $('#fmuser').form('submit',{
                        url: url,
                        onSubmit: function(){
                            //return $(this).form('enableValidation').form('validate');
                            var v=$(this).form('validate');
                            if(!v) $.messager.progress('close');
                            return v;                    
                        },
                        success: function(result){
                            $.messager.progress('close');
                            //alert(result);                            
                            if (result.errorMsg){
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            } else {
                                $('#dlguser').dialog('close');		// close the dialog
                                $('#dguser').datagrid('reload');	// reload the user data
                            }
                        }
                    });
                } else { 
                    alert('Format password salah');
                    return false;
                }
            } else { 
                $.messager.progress({height:75, text:'Proses simpan data...'});               
                $('#fmuser').form('submit',{
                    url: url,
                    onSubmit: function(){
                        //return $(this).form('enableValidation').form('validate');
                        var v=$(this).form('validate');
                        if(!v) $.messager.progress('close');
                        return v;                    
                    },
                    success: function(result){
                        $.messager.progress('close');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlguser').dialog('close');		// close the dialog
                            $('#dguser').datagrid('reload');	// reload the user data
                        }
                    }
                });
            }
            
    	}
    	function destroyuser(index){
            var row = $('#dguser').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus user "'+row.user_fullnameuser+'"?',function(r){
    				if (r){
    					$.post('destroy_user.php',{id:row.iduser},function(result){
    						if (result.success){
    							$('#dguser').datagrid('reload');	// reload the user data
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
    	// function resetpass(index){
        //     var row = $('#dguser').datagrid('getRow', index);
    	// 	if (row){
    	// 		$.messager.confirm('Konfirmasi','Yakin akan me-reset ulang password "'+row.user_fullnameuser+'" sesuai menjadi "'+row.user_nameuser+'@plnt"?',function(r){
    	// 			if (r){
    	// 				$.post('reset_password.php',{id:row.iduser,usernya:row.user_nameuser},function(result){
        //                     //alert(result);
    	// 					if (result.success){
    	// 						$('#dguser').datagrid('reload');
    	// 						$.messager.show({
    	// 							title: 'Sukses',
    	// 							msg: "Password user berhasil di reset sesuai dengan username"
    	// 						});
    	// 					} else {
    	// 						$.messager.show({
    	// 							title: 'Error',
    	// 							msg: result.errorMsg
    	// 						});
    	// 					}
    	// 				},'json');
    	// 			}
    	// 		});
    	// 	}
    	// }
    	function resetpass(index){
            var row = $('#dguser').datagrid('getRow', index);
    		if (row){
                $('#dlgreset').dialog('open').dialog('setTitle','Reset Password User');
                $('#fmreset').form('clear');
    			$('#fmreset').form('load',row);      
                url = 'save_reset.php?id='+row.iduser;  
    		}
    	}
    	function savereset(){
            var nilai1 = $('#newpassworduser').textbox('getValue');
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

            $('#fmreset').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
                },
                success: function(result){
                    // alert(result);
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgreset').dialog('close');
                        $('#dguser').datagrid('reload');
                    }
                }
            });
    	}        
        
    	function settinguser(index){
            var row = $('#dguser').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Pengaturan Akses')){
                    $('#tt').tabs('select','Pengaturan Akses');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', 'settinguser.php?username='+row.user_nameuser);
                } else {
                    $('#tt').tabs('add',{
                        title: 'Pengaturan Akses',
                        href: 'settinguser.php?username='+row.user_nameuser,
                        closable: true
                    });
                }
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