<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/kepegawaian/"
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
            "id":1901,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black; height:40px !important;' onclick='addPanel1901()'><span style='height:30px;'>Title</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1902,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1902()'><span style='height:30px;'>Gelar Depan</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1903,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1903()'><span style='height:30px;'>Gelar Belakang</span></a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1904,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1904()'>Negara</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1905,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1905()'>Jenis Kelamin</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1906,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1906()'>Agama</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1907,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1907()'>Status Nikah</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1909,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1909()'>Kewarganegaraan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1910,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1910()'>Golongan Darah</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1911,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1911()'>Jenis DPLK</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1912,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1912()'>Suku</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1913,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1913()'>Jenis Alamat</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1914,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1914()'>Provinsi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1915,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1915()'>Kabupaten/Kota</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1916,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1916()'>Jenis Keluarga</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1917,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1917()'>Pekerjaan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1918,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1918()'>PLN Group</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1919,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1919()'>Keterangan Pendidikan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1920,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1920()'>Jenis Pendidikan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1921,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1921()'>Satuan Pendidikan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1922,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1922()'>Grade</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1923,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1923()'>Reason</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1924,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1924()'>EE Group</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1925,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1925()'>EE Sub Group</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1926,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1926()'>Company Code</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1927,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1927()'>Business Area</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1928,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1928()'>Posisi Kunci</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1929,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1929()'>Jenis Asuransi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1930,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1930()'>Keterangan Mutasi</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1931,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1931()'>Alasan Berhenti</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        },{
            "id":1932,
            "text":"<div id='tab-tools'><a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanel1932()'>Jenjang Jabatan</a></div>",
            "iconCls":"fa fa-hand-point-right blue"
        }];
        $("#tt42").tree();
        $("#tt42").tree("loadData",data2);
    });
    </script>

    <script type="text/javascript">   
        $('#tt42').tree({
            onClick: function(node){
                $(this).tree('toggle', node.target);
            }
        });

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
		<div data-options="region:'north'" style="height:40px;padding:10px;background:#eceff2;">
            <span style="font-size:16px;">DATA MASTER KEPEGAWAIAN</span>
        </div>
		<div data-options="region:'west',split:false,collapsible:false" title="<span style='font-size:11px;'>SUB MENU</span>" style="width:200px;">
            <div id="menu42" class="easyui-panel" style="padding:5px; height: 100%; background: transparent; border: none;">
                <ul id="tt42" class="easyui-tree" data-options="method:'get',animate:true,lines:true"></ul>
            </div>
        </div>
		<div id="center" data-options="region:'center',iconCls:'icon-ok'" title="" style="padding:0px">
            <div id="tt4" class="easyui-tabs" data-options="tools:'#'" headerCls="headernya" style="width:100%;border:none !important;"></div>
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
        function addPanel1901(){			
            index=1901;
            if ($('#tt4').tabs('exists','M-Title')){
                $('#tt4').tabs('select','M-Title');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mtitle.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Title',
                    href: '<?=$foldernya;?>mtitle.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1902(){			
            index=1902;
            if ($('#tt4').tabs('exists','M-Gelar Depan')){
                $('#tt4').tabs('select','M-Gelar Depan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mgdepan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Gelar Depan',
                    href: '<?=$foldernya;?>mgdepan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1903(){			
            index=1903;
            if ($('#tt4').tabs('exists','M-Gelar Belakang')){
                $('#tt4').tabs('select','M-Gelar Belakang');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mgbelakang.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Gelar Belakang',
                    href: '<?=$foldernya;?>mgbelakang.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1904(){			
            index=1904;
            if ($('#tt4').tabs('exists','M-Negara')){
                $('#tt4').tabs('select','M-Negara');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mnegara.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Negara',
                    href: '<?=$foldernya;?>mnegara.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1905(){			
            index=1905;
            if ($('#tt4').tabs('exists','M-Jenis Kelamin')){
                $('#tt4').tabs('select','M-Jenis Kelamin');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjkelamin.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Kelamin',
                    href: '<?=$foldernya;?>mjkelamin.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1906(){			
            index=1906;
            if ($('#tt4').tabs('exists','M-Agama')){
                $('#tt4').tabs('select','M-Agama');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>magama.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Agama',
                    href: '<?=$foldernya;?>magama.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1907(){			
            index=1907;
            if ($('#tt4').tabs('exists','M-Status Nikah')){
                $('#tt4').tabs('select','M-Status Nikah');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>msnikah.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Status Nikah',
                    href: '<?=$foldernya;?>msnikah.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1909(){			
            index=1909;
            if ($('#tt4').tabs('exists','M-Kewarganegaraan')){
                $('#tt4').tabs('select','M-Kewarganegaraan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mkewarganegaraan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Kewarganegaraan',
                    href: '<?=$foldernya;?>mkewarganegaraan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1910(){			
            index=1910;
            if ($('#tt4').tabs('exists','M-Golongan Darah')){
                $('#tt4').tabs('select','M-Golongan Darah');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mgdarah.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Golongan Darah',
                    href: '<?=$foldernya;?>mgdarah.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1911(){			
            index=1911;
            if ($('#tt4').tabs('exists','M-Jenis DPLK')){
                $('#tt4').tabs('select','M-Jenis DPLK');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mdplk.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis DPLK',
                    href: '<?=$foldernya;?>mdplk.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1912(){			
            index=1912;
            if ($('#tt4').tabs('exists','M-Suku')){
                $('#tt4').tabs('select','M-Suku');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>msuku.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Suku',
                    href: '<?=$foldernya;?>msuku.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1913(){			
            index=1913;
            if ($('#tt4').tabs('exists','M-Jenis Alamat')){
                $('#tt4').tabs('select','M-Jenis Alamat');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjalamat.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Alamat',
                    href: '<?=$foldernya;?>mjalamat.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1914(){			
            index=1914;
            if ($('#tt4').tabs('exists','M-Jenis Provinsi')){
                $('#tt4').tabs('select','M-Jenis Provinsi');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mprovinsi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Provinsi',
                    href: '<?=$foldernya;?>mprovinsi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1915(){			
            index=1915;
            if ($('#tt4').tabs('exists','M-Kabupaten/Kota')){
                $('#tt4').tabs('select','M-Kabupaten/Kota');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mkabkot.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Kabupaten/Kota',
                    href: '<?=$foldernya;?>mkabkot.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1916(){			
            index=1916;
            if ($('#tt4').tabs('exists','M-Jenis Keluarga')){
                $('#tt4').tabs('select','M-Jenis Keluarga');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjkeluarga.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Keluarga',
                    href: '<?=$foldernya;?>mjkeluarga.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1917(){			
            index=1917;
            if ($('#tt4').tabs('exists','M-Pekerjaan')){
                $('#tt4').tabs('select','M-Pekerjaan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mpekerjaan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Pekerjaan',
                    href: '<?=$foldernya;?>mpekerjaan.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1918(){			
            index=1918;
            if ($('#tt4').tabs('exists','M-PLN Group')){
                $('#tt4').tabs('select','M-PLN Group');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mplng.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-PLN Group',
                    href: '<?=$foldernya;?>mplng.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1919(){			
            index=1919;
            if ($('#tt4').tabs('exists','M-Keterangan Pendidikan')){
                $('#tt4').tabs('select','M-Keterangan Pendidikan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mkpend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Keterangan Pendidikan',
                    href: '<?=$foldernya;?>mkpend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1920(){			
            index=1920;
            if ($('#tt4').tabs('exists','M-Jenis Pendidikan')){
                $('#tt4').tabs('select','M-Jenis Pendidikan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjpend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Pendidikan',
                    href: '<?=$foldernya;?>mjpend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1921(){			
            index=1921;
            if ($('#tt4').tabs('exists','M-Satuan Pendidikan')){
                $('#tt4').tabs('select','M-Satuan Pendidikan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mspend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Satuan Pendidikan',
                    href: '<?=$foldernya;?>mspend.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1922(){			
            index=1922;
            if ($('#tt4').tabs('exists','M-Grade')){
                $('#tt4').tabs('select','M-Grade');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mgrade.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Grade',
                    href: '<?=$foldernya;?>mgrade.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1923(){			
            index=1923;
            if ($('#tt4').tabs('exists','M-Reason')){
                $('#tt4').tabs('select','M-Reason');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mreason.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Reason',
                    href: '<?=$foldernya;?>mreason.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1924(){			
            index=1924;
            if ($('#tt4').tabs('exists','M-EE Group')){
                $('#tt4').tabs('select','M-EE Group');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>meegroup.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-EE Group',
                    href: '<?=$foldernya;?>meegroup.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1925(){			
            index=1925;
            if ($('#tt4').tabs('exists','M-EE Sub Group')){
                $('#tt4').tabs('select','M-EE Sub Group');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>meesubgroup.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-EE Sub Group',
                    href: '<?=$foldernya;?>meesubgroup.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1926(){			
            index=1926;
            if ($('#tt4').tabs('exists','M-Company Code')){
                $('#tt4').tabs('select','M-Company Code');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mccode.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Company Code',
                    href: '<?=$foldernya;?>mccode.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1927(){			
            index=1927;
            if ($('#tt4').tabs('exists','M-Business Area')){
                $('#tt4').tabs('select','M-Business Area');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mbarea.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Business Area',
                    href: '<?=$foldernya;?>mbarea.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1928(){			
            index=1928;
            if ($('#tt4').tabs('exists','M-Posisi Kunci')){
                $('#tt4').tabs('select','M-Posisi Kunci');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mposisikunci.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Posisi Kunci',
                    href: '<?=$foldernya;?>mposisikunci.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1929(){			
            index=1929;
            if ($('#tt4').tabs('exists','M-Jenis Asuransi')){
                $('#tt4').tabs('select','M-Jenis Asuransi');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjasuransi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenis Asuransi',
                    href: '<?=$foldernya;?>mjasuransi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1930(){			
            index=1930;
            if ($('#tt4').tabs('exists','M-Keterangan Mutasi')){
                $('#tt4').tabs('select','M-Keterangan Mutasi');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mkmutasi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Keterangan Mutasi',
                    href: '<?=$foldernya;?>mkmutasi.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1931(){			
            index=1931;
            if ($('#tt4').tabs('exists','M-Alasan Berhenti')){
                $('#tt4').tabs('select','M-Alasan Berhenti');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>maberhenti.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Alasan Berhenti',
                    href: '<?=$foldernya;?>maberhenti.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        function addPanel1932(){			
            index=1932;
            if ($('#tt4').tabs('exists','M-Jenjang Jabatan')){
                $('#tt4').tabs('select','M-Jenjang Jabatan');
                var tab = $('#tt4').tabs('getSelected');
                tab.panel('refresh', '<?=$foldernya;?>mjenjang.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
            } else {
                $('#tt4').tabs('add',{
                    title: 'M-Jenjang Jabatan',
                    href: '<?=$foldernya;?>mjenjang.php?proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                    closable: true
                });
            }			
        }

        // $("#center").height($(window).height() - 200);
        $("#tt4").height($(window).height() - 200);
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