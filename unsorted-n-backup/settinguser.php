<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if (!$userhris || $superadminhris!="1"){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    $username2 = $_REQUEST['username'];
    $rs2 = mysqli_query($koneksi,"select user_fullname from masteruser where user_name='$username2'");
    $hasil2 = mysqli_fetch_array($rs2);
    $nama_user = stripslashes ($hasil2['user_fullname']);

    ?>
    <script>
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
		/*
		$('#jumlahsettinguser').numberbox('textbox').bind('keydown', function (e) {
  			s = $(this).val();
			  alert(s);
		});
		*/			  

    </script>

    <script type="text/javascript">   
        function aksisettinguser(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update psplo" onclick="editsettinguser(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
            return a;
        }  

        function prosesnya(value,row,index){
            if(parseInt(row.prosessettinguser)===1){
                var a = '<button class="easyui-linkbutton c1" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;"><i class="fa fa-check"></i></button>';
            } else {
                var a = '<button class="easyui-linkbutton c5" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;"><i class="fa fa-times"></i></button>';
            }
            return a;
        }  

        function lihatnya(value,row,index){
            if(parseInt(row.lihatsettinguser)===1){
                var a = '<button class="easyui-linkbutton c1" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;"><i class="fa fa-check"></i></button>';
            } else {
                var a = '<button class="easyui-linkbutton c5" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;"><i class="fa fa-times"></i></button>';
            }
            return a;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
    </script> 
    
    <script type="text/javascript">
    $(function(){  
    });
    </script>
    <table id="dgsettinguser" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_settinguser.php?username=<?=$username2;?>" pageSize="20"        
    		toolbar="#toolbarsettinguser" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksisettinguser" width="50" align="center" halign="center" data-options="formatter:aksisettinguser">AKSI</th>
				<th field="grupsettinguser" width="300" align="left" halign="center">GRUP</th>
    			<th field="nama_menusettinguser" width="300" align="left" halign="center">MENU</th>
    			<th field="prosesnya" width="100" align="center" halign="center" data-options="formatter:prosesnya">PROSES</th>
    			<th field="lihatnya" width="100" align="center" halign="center" data-options="formatter:lihatnya">VIEW</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarsettinguser" style="background-color:#bbdaef;">
    	<div id="tbsettinguser" style="padding:5px;font-size:14px;">
            NAMA USER : <?=strtoupper($nama_user);?>
    	</div>        
    </div>
    
    <div id="dlgsettinguser" class="easyui-dialog" modal="true" style="min-width:300px;min-height:100px;max-height:600px;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:20px;"
    		closed="true" buttons="#dlg-buttonssettinguser">
    	<form id="fmsettinguser" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
			<input type="hidden" id="idsettinguser" name="idsettinguser" />
            <table>
            <tr>
                <td style="white-space:nowrap;">Nama Menu</td>
                <td>
                    <input class="easyui-textbox" id="nama_menusettinguser" name="nama_menusettinguser" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;" readonly>
                </td>
            </tr>
            <tr>
                <td>Proses</td>
                <td>
                    <select id="prosessettinguser" name="prosessettinguser" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100px;">
                       <option value="0">TIDAK</option>
                       <option value="1">YA</option>
                    </select>                            
                </td>
            </tr>
            <tr>
                <td>View</td>
                <td>
                    <select id="lihatsettinguser" name="lihatsettinguser" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100px;">
                       <option value="0">TIDAK</option>
                       <option value="1">YA</option>
                    </select>                            
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssettinguser">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesettinguser()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsettinguser').dialog('close')" style="min-width:90px">Batal</a>
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
        
    	function editsettinguser(index){
            var row = $('#dgsettinguser').datagrid('getRow', index);
    		if (row){
                $('#dlgsettinguser').dialog('open').dialog('setTitle','Update Akses User');
                $('#fmsettinguser').form('clear');
				$('#fmsettinguser').form('load',row); 
                url = 'update_settinguser.php?id='+row.idsettinguser+'&username=<?=$username2;?>&idmenu='+row.idmenusettinguser;
            }          
    	}
        
    	function savesettinguser(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
    		$('#fmsettinguser').form('submit',{
    			url: url,
    			onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
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
    					$('#dlgsettinguser').dialog('close');
    					$('#dgsettinguser').datagrid('reload');
						$('#dghistorypengadaan').datagrid('reload');
						if ($('#tt').tabs('exists','Permintaan Pengadaan')){
                    		$('#tt').tabs('getTab','Permintaan Pengadaan');
							$('#dgpsplo').datagrid('reload');							
						}

    				}
    			}
    		});
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