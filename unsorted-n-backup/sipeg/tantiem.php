<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $foldernya = "sipeg/";
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
    </script>

    <script type="text/javascript">                     
		function doSearchtantiem(){
            $('#dgtantiem').datagrid('load',{
				tahuntantiemcari: $('#tahuntantiemcari').numberbox('getValue')
			});
		}
        function aksitantiem(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Edit" onclick="edittantiem(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                a += '<a href="javascript:void(0)" title="Hapus" onclick="destroytantiem(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:0px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                a += '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:0px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;';
		}
        
        function formatrp2(val,row){
            if(val===""){
                return "";
            } else {
                return number_format2(val,0,',','.');
            }
        };
        
        function number_format2(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        
        function formatrp3(val,row){
            if(val===""){
                return "";
            } else {
                return number_format3(val,2,',','.');
            }
        };
        
        function number_format3(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"")+"%";
        }
        
        $('#niptantiem').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#niptantiem').combobox({
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
        $("#dgtantiem").datagrid({
        });
    });
    </script>
    <table id="dgtantiem" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_tantiem.php" pageSize="20"        
    		toolbar="#toolbartantiem" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksitantiem" width="80" align="center" halign="center" data-options="formatter:aksitantiem,styler:styler1">Aksi</th>
    			<th field="tahuntantiem" width="80" align="center" halign="center" data-options="styler:styler1">Tahun</th>
    			<th field="blthtantiem" width="100" align="center" halign="center" data-options="styler:styler1">BLTH</th>
    			<th field="niptantiem" width="120" align="center" halign="center" data-options="styler:styler1">Nip</th>
    			<th field="niptantiem" width="120" align="center" halign="center" data-options="styler:styler1">Nip</th>
    			<th field="namatantiem" width="200" align="left" halign="left" data-options="styler:styler1">Nama</th>
    			<th field="jabatantantiem" width="300" align="left" halign="left" data-options="styler:styler1">Jabatan</th>
                <th field="tantiemtantiem" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tantiem</th>
                <th field="pph21tantiem" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">PPh 21</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbartantiem" style="background-color:#fff;padding:5px;">
    	<div id="tbtantiem" style="padding:3px">
            <table>
            <tr>
                <td>Tahun Realisasi</td>
                <td>
                    <input class="easyui-numberbox" id="tahuntantiemcari" name="tahuntantiemcari" value="<?=date('Y');?>" data-options="required:true,min:2018" style="width: 80px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtantiem()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addtantiem()" style="min-width:90px;">Tambah</a>
                </td>
            </tr>
            </table>            
    	</div>        
    </div>
    
    <div id="dlgtantiem" class="easyui-dialog" modal="true" style="min-width:400px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonstantiem">
    	<form id="fmtantiem" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Tahun Tantiem</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="tahuntantiem" name="tahuntantiem" missingMessage="Harus di isi" data-options="required:true,min:2020" style="width: 60px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Bulan Realisasi</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-datebox" id="blthtantiem" name="blthtantiem" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Pegawai</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-combobox"
                            id="niptantiem"
                            name="niptantiem" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 350px;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_pegawaitantiem.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Nilai Tantiem</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="tantiemtantiem" name="tantiemtantiem" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">PPh Terbayar</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="pph21tantiem" name="pph21tantiem" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;">
                    </div>
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstantiem">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetantiem()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtantiem').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addtantiem(){
    		$('#dlgtantiem').dialog('open').dialog('setTitle','Input Data');
    		$('#fmtantiem').form('clear');
            $("#blthtantiem").datebox('setValue','<?=date("Y");?>');
    		url = '<?=$foldernya;?>save_tantiem.php';
    	}
    	function edittantiem(index){
            var row = $('#dgtantiem').datagrid('getRow', index);
            if (row){
                $('#dlgtantiem').dialog('open').dialog('setTitle','Edit Data');
                $('#fmtantiem').form('clear');
                $('#fmtantiem').form('load',row);
                url = '<?=$foldernya;?>update_tantiem.php?id='+row.idtantiem;
            }
    	}
    	function savetantiem(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmtantiem').form('submit',{
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
                        $('#dlgtantiem').dialog('close');
                        $('#dgtantiem').datagrid('reload');
                    }
                }
            });
    	}
    	function destroytantiem(index){
            var row = $('#dgtantiem').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_tantiem.php',{id:row.idtantiem},function(result){
    						if (result.success){
    							$('#dgtantiem').datagrid('reload');	// reload the user data
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
        //$("#dgtantiem").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmuser{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:normal;
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
        .brxsmall {
            display: block;
            /*margin-bottom: -.1em !important;*/
            margin-bottom: 0.5em !important;
        }
        .brxsmall1 {
            display: block;
            margin-bottom: 0.2em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.0em !important;
        }
        .brxsmall3 {
            display: block;
            margin-bottom: -.2em !important;
        }

    </style>
<?php    
}
?>