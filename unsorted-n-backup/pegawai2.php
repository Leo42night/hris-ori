<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    $nip = $_REQUEST['nip'];
    $rs2 = mysqli_query($koneksi,"select start_date,end_date,nama_lengkap from data_pegawai where nip='$nip'");
    $hasil2 = mysqli_fetch_array($rs2);
    $start_date = stripslashes ($hasil2['start_date']);
    $end_date = stripslashes ($hasil2['end_date']);
    $nama_lengkap = stripslashes ($hasil2['nama_lengkap']);
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

    <script>
    $(document).ready(function(){
        var data2=
        [{
            "id":901,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black; height:40px !important;' onclick='addPanel901()'><span style='height:30px;'>Data Alamat</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":902,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel902()'><span style='height:30px;'>Data Keluarga</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":903,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel903()'><span style='height:30px;'>Pendidikan</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":904,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel904()'>Grade</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":905,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel905()'>Jabatan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":906,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel906()'>Talenta</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":907,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel907()'>Sertifikat Kompetensi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":908,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel908()'>Grievances</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":909,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel909()'>Identitas Lainnya</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":910,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel910()'>Awards</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":911,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel911()'>Atasan Langsung</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":912,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel912()'>Keanggotaan Lembaga</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":913,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel913()'>Karya Tulis</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":914,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel914()'>Pembicara</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":915,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel915()'>Keahlian</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":916,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel916()'>Penugasan Lain</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":917,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel917()'>Diklat</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":918,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel918()'>Diklat Penjenjangan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":919,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel919()'>Pengajar</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":920,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel920()'>Media Sosial</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":921,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel921()'>Uraian Jabatan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":923,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel923()'>Cluster</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":924,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel924()'>KeyB</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":925,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel925()'>Kompetensi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":926,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel926()'>Rekomendasi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":927,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel927()'>Foto</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        /*
        },{
            "id":928,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel928()'>Position Management</a></div>",
            "iconCls":"fa fa-hand-point-right blue"            
        */
        }];
        $("#tt22").tree();
        $("#tt22").tree("loadData",data2);
    });
    </script>

    <script type="text/javascript">                     
		function doSearchpegawai(){
            $('#dgpegawai').datagrid('load',{
				namapegawaicari: $('#namapegawaicari').textbox('getValue')
			});
		}
        function aksipegawai(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpegawai(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypegawai(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  
        function aksipegawai2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Kelengkapan Data" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">KELENGKAPAN DATA</button></a>';
            return a;
        }  

        function namanya(value,row,index){
            var a = row.user_fullnameuser;
            var b = '<span style="color:#337ab7;">'+row.jabatanuser+'</span>';
            return a+"<br/>"+b;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kode_negarapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukupegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negarapegawai').combobox({
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
        $('#sukupegawai').combobox({
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
        });
    </script>

	<div class="easyui-layout" style="width:100%;height:100%;">
		<div data-options="region:'north'" style="height:70px;padding:5px;background:#eceff2;">
            <table>
                <tr>
                    <td style="width:140px;"><span style="font-size:16px;">Nomor Induk</span></td>
                    <td style="width:5px;"><span style="font-size:16px;">:</span></td>
                    <td style="font-weight:bold;"><span style="font-size:16px;"><?=$nip;?></span></td>
                </tr>
                <tr>
                    <td><span style="font-size:16px;">Nama Pegawai</span></td>
                    <td><span style="font-size:16px;">:</span></td>
                    <td style="font-weight:bold;"><span style="font-size:16px;"><?=$nama_lengkap;?></span></td>
                </tr>
            </table>
        </div>
		<div data-options="region:'west',split:false,collapsible:false" title="<span style='font-size:11px;'>RIWAYAT PEGAWAI</span>" style="width:200px;">
            <div id="menu22" class="easyui-panel" style="padding:5px; height: 100%; background: transparent; border: none;font-size:">
                <ul id="tt22" class="easyui-tree" data-options="method:'get',animate:true,lines:true"></ul>
            </div>
        </div>
		<div data-options="region:'center',iconCls:'icon-ok'" title="" style="padding:0px">
            <div id="tt3" class="easyui-tabs" data-options="tools:'#'" headerCls="headernya" style="width:100%;border:none !important;"></div>
            <!--
			<div class="easyui-layout" data-options="fit:true">
				<div data-options="region:'north',split:true" style="height:50px"></div>
				<div data-options="region:'west',split:true" style="width:100px"></div>
				<div data-options="region:'center'"></div>
			</div>
            -->
		</div>
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
    	function addpegawai(){
    		$('#dlgpegawai').dialog('open').dialog('setTitle','Input Data Pegawai');
    		$('#fmpegawai').form('clear');
    		url = 'save_pegawai.php';
    	}
    	function editpegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
    		if (row){
                $('#dlgpegawai').dialog('open').dialog('setTitle','Update Data Pegawai');
                $('#fmpegawai').form('clear');
    			$('#fmpegawai').form('load',row);      
                url = 'update_pegawai.php?id='+row.idpegawai;  
            }          
    	}
    	function savepegawai(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpegawai').form('submit',{
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
                        $('#dlgpegawai').dialog('close');
                        $('#dgpegawai').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data pegawai "'+row.nama_lengkappegawai+'"?',function(r){
    				if (r){
    					$.post('destroy_pegawai.php',{id:row.idpegawai},function(result){
    						if (result.success){
    							$('#dgpegawai').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepeg(){
    		$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template Pegawai');
            $('#fmtemplatepeg').form('clear');
    		url = 'save_templatepeg.php';
    	}
    	function savetemplatepeg(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepeg').form('submit',{
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
    					$('#dlgtemplatepeg').dialog('close');
    					$('#dgpegawai').datagrid('reload');
    				}
    			}
    		});
    	}
        /*
    	function detailpegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Data Riwayat')){
                    $('#tt').tabs('select','Data Riwayat');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', 'pegawai2.php?nip='+row.nippegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
                } else {
                    $('#tt').tabs('add',{
                        title: 'Data Riwayat',
                        href: 'pegawai2.php?nip='+row.nippegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                        closable: true
                    });
                }
    		}
    	}
        */

        function addPanel901(){			
            index=901;
            if ($('#tt3').tabs('exists','Data Alamat')){
                $('#tt3').tabs('select','Data Alamat');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'alamat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Data Alamat',
                    href: 'alamat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel902(){			
            index=902;
            if ($('#tt3').tabs('exists','Data Keluarga')){
                $('#tt3').tabs('select','Data Keluarga');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'keluarga.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Data Keluarga',
                    href: 'keluarga.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel903(){			
            index=903;
            if ($('#tt3').tabs('exists','Riwayat Pendidikan')){
                $('#tt3').tabs('select','Riwayat Pendidikan');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'pendidikan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Pendidikan',
                    href: 'pendidikan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel904(){			
            index=904;
            if ($('#tt3').tabs('exists','Riwayat Grade')){
                $('#tt3').tabs('select','Riwayat Grade');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'grade.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Grade',
                    href: 'grade.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel905(){			
            index=905;
            if ($('#tt3').tabs('exists','Riwayat Jabatan')){
                $('#tt3').tabs('select','Riwayat Jabatan');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'jabatan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Jabatan',
                    href: 'jabatan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel906(){			
            index=906;
            if ($('#tt3').tabs('exists','Riwayat Talenta')){
                $('#tt3').tabs('select','Riwayat Talenta');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'talenta.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Talenta',
                    href: 'talenta.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel907(){			
            index=907;
            if ($('#tt3').tabs('exists','Riwayat Sertifikat Kompetensi')){
                $('#tt3').tabs('select','Riwayat Sertifikat Kompetensi');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'sertifikat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Sertifikat Kompetensi',
                    href: 'sertifikat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel908(){			
            index=908;
            if ($('#tt3').tabs('exists','Grievances')){
                $('#tt3').tabs('select','Grievances');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'hukuman.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Grievances',
                    href: 'hukuman.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel909(){			
            index=909;
            if ($('#tt3').tabs('exists','Identitas Lainnya')){
                $('#tt3').tabs('select','Identitas Lainnya');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'identitas.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Identitas Lainnya',
                    href: 'identitas.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel910(){			
            index=910;
            if ($('#tt3').tabs('exists','Riwayat Awards')){
                $('#tt3').tabs('select','Riwayat Awards');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'award.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Awards',
                    href: 'award.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel911(){			
            index=911;
            if ($('#tt3').tabs('exists','Riwayat Atasan')){
                $('#tt3').tabs('select','Riwayat Atasan');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'atasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Riwayat Atasan',
                    href: 'atasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel912(){			
            index=912;
            if ($('#tt3').tabs('exists','Keanggotaan Lembaga')){
                $('#tt3').tabs('select','Keanggotaan Lembaga');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'lembaga.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Keanggotaan Lembaga',
                    href: 'lembaga.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel913(){			
            index=913;
            if ($('#tt3').tabs('exists','Karya Tulis')){
                $('#tt3').tabs('select','Karya Tulis');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'karyatulis.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Karya Tulis',
                    href: 'karyatulis.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel914(){			
            index=914;
            if ($('#tt3').tabs('exists','Pembicara')){
                $('#tt3').tabs('select','Pembicara');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'pembicara.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Pembicara',
                    href: 'pembicara.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel915(){	
            index=915;
            if ($('#tt3').tabs('exists','Keahlian')){
                $('#tt3').tabs('select','Keahlian');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('award', 'keahlian.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Keahlian',
                    href: 'keahlian.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }
        }

        function addPanel916(){			
            index=916;
            if ($('#tt3').tabs('exists','Penugasan Lain')){
                $('#tt3').tabs('select','Penugasan Lain');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'penugasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Penugasan Lain',
                    href: 'penugasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel916(){			
            index=916;
            if ($('#tt3').tabs('exists','Penugasan Lain')){
                $('#tt3').tabs('select','Penugasan Lain');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'penugasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Penugasan Lain',
                    href: 'penugasan.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel917(){			
            index=917;
            if ($('#tt3').tabs('exists','Diklat')){
                $('#tt3').tabs('select','Diklat');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'diklat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Diklat',
                    href: 'diklat.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel918(){			
            index=918;
            if ($('#tt3').tabs('exists','Diklat Penjenjangan')){
                $('#tt3').tabs('select','Diklat Penjenjangan');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'diklatp.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Diklat Penjenjangan',
                    href: 'diklatp.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel919(){			
            index=919;
            if ($('#tt3').tabs('exists','Pengajar')){
                $('#tt3').tabs('select','Pengajar');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'pengajar.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Pengajar',
                    href: 'pengajar.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel920(){			
            index=920;
            if ($('#tt3').tabs('exists','Media Sosial')){
                $('#tt3').tabs('select','Media Sosial');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'medsos.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Media Sosial',
                    href: 'medsos.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel921(){			
            index=921;
            if ($('#tt3').tabs('exists','Uraian Jabatan')){
                $('#tt3').tabs('select','Uraian Jabatan');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'urjab.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Uraian Jabatan',
                    href: 'urjab.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel922(){			
            index=922;
            if ($('#tt3').tabs('exists','Assesment')){
                $('#tt3').tabs('select','Assesment');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'assesment.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Assesment',
                    href: 'assesment.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel923(){			
            index=923;
            if ($('#tt3').tabs('exists','Cluster')){
                $('#tt3').tabs('select','Cluster');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'cluster.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Cluster',
                    href: 'cluster.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel924(){			
            index=924;
            if ($('#tt3').tabs('exists','KeyB')){
                $('#tt3').tabs('select','KeyB');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'keyb.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'KeyB',
                    href: 'keyb.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel925(){			
            index=925;
            if ($('#tt3').tabs('exists','Kompetensi')){
                $('#tt3').tabs('select','Kompetensi');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'kompetensi.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Kompetensi',
                    href: 'kompetensi.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel926(){			
            index=926;
            if ($('#tt3').tabs('exists','Rekomendasi')){
                $('#tt3').tabs('select','Rekomendasi');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'rekomendasi.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Rekomendasi',
                    href: 'rekomendasi.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel927(){			
            index=927;
            if ($('#tt3').tabs('exists','Foto')){
                $('#tt3').tabs('select','Foto');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'foto.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Foto',
                    href: 'foto.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel928(){			
            index=928;
            if ($('#tt3').tabs('exists','Position Management')){
                $('#tt3').tabs('select','Position Management');
                var tab = $('#tt3').tabs('getSelected');
                tab.panel('refresh', 'pmanagement.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt3').tabs('add',{
                    title: 'Position Management',
                    href: 'pmanagement.php?nip=<?=$nip;?>&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        $("#tt3").height($(window).height() - 200);
        //$("#dgpegawai").height($(window).height() - 0);
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