<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/konsumsi/"
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
		function doSearchkonsumsi(){
            //kosongkan();
            $('#dgkonsumsi').datagrid('load',{    
                tgl_awalkonsumsicari: $('#tgl_awalkonsumsicari').datebox('getValue'),
                tgl_akhirkonsumsicari: $('#tgl_akhirkonsumsicari').datebox('getValue'),
                nipkonsumsicari: $('#nipkonsumsicari').textbox('getValue'),			            
			});                        
		}
        
        $('#kd_unitkonsumsicari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkkonsumsicari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokkonsumsicari(){
            var nilai1 = $('#kelompokkonsumsicari').combobox('getValue');
            var nilai2 = $('#kd_regionkonsumsicari').combobox('getValue');
            var nilai3 = $('#kd_cabangkonsumsicari').combobox('getValue');
            var url1 = 'get_spkkonsumsicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkkonsumsicari').combogrid('clear');
            $('#no_spkkonsumsicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkkonsumsicari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionkonsumsicari(){
            var nilai1 = $('#kelompokkonsumsicari').combobox('getValue');
            var nilai2 = $('#kd_regionkonsumsicari').combobox('getValue');
            var nilai3 = $('#kd_cabangkonsumsicari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkkonsumsicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangkonsumsicari').combobox('clear');
            $('#kd_cabangkonsumsicari').combobox('reload',url2);
            $('#kd_cabangkonsumsicari').combobox('setValue','000');

            $('#kd_unitkonsumsicari').combobox('clear');
            $('#kd_unitkonsumsicari').combobox('reload',url3);
            $('#kd_unitkonsumsicari').combobox('setValue','semua');
            /*
            $('#no_spkkonsumsicari').combogrid('clear');
            $('#no_spkkonsumsicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkkonsumsicari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangkonsumsicari(){
            var nilai1 = $('#kelompokkonsumsicari').combobox('getValue');
            var nilai2 = $('#kd_regionkonsumsicari').combobox('getValue');
            var nilai3 = $('#kd_cabangkonsumsicari').combobox('getValue');
            //var url1 = 'get_spkkonsumsicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitkonsumsicari').combobox('clear');
            $('#kd_unitkonsumsicari').combobox('reload',url2);
            $('#kd_unitkonsumsicari').combobox('setValue','semua');
            /*
            $('#no_spkkonsumsicari').combogrid('clear');
            $('#no_spkkonsumsicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkkonsumsicari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jeniskonsumsicari').combobox('getValue');
            var nilai2 = $('#kd_projectkonsumsicari').combobox('getValue');
            var url2 = 'get_unitkonsumsicari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitkonsumsicari').combobox('enable');
            //$('#kd_unitkonsumsicari').combobox('clear'); 
            $('#kd_unitkonsumsicari').combogrid('clear');
            $('#kd_unitkonsumsicari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksikonsumsi(value,row,index){
            if(parseInt(row.approve2konsumsi)!==2){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editkonsumsi(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroykonsumsi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            }
            return a+b;
        }  

        function pengajuannyakonsumsi(value,row,index){
            var a = row.no_pengajuankonsumsi;
            a += '<br/><span style="font-size:10px !important;color:#0062c2;">'+row.tgl_permintaan2konsumsi+'</span>';
            return a;
        }  

        function pemesannyakonsumsi(value,row,index){
            var a = row.user_permintaankonsumsi;
            a += '<br/><span style="font-size:10px !important;color:#0062c2;">'+row.nama_permintaankonsumsi+'</span>';
            return a;
        }  

        function jenisnyakonsumsi(value,row,index){
            var a = row.jenis_acarakonsumsi;
            a += '<br/><span style="font-size:10px !important;color:#0062c2;">'+row.lokasikonsumsi+'</span>';
            return a;
        }  

        function uraiannyakonsumsi(value,row,index){
            var a = row.tgl_acara2konsumsi;
            a += '<br/><span style="font-size:10px !important;color:#0062c2;">'+row.uraian_acarakonsumsi+'</span>';
            return a;
        }  

        function makanannyakonsumsi(value,row,index){
            var a = row.jenis_makanankonsumsi;
            a += '<br/><span style="font-size:10px !important;color:#0062c2;">'+row.uraian_makanankonsumsi+'</span>';
            return a;
        }  

        function approval1nyakonsumsi(value,row,index){
            var a = row.nama_approval1konsumsi;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve1konsumsi)===2){
                a += '<span style="color:#0062c2;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve12konsumsi+'</span>'
            } else if(parseInt(row.approve1konsumsi)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject1konsumsi+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }

        function approval2nyakonsumsi(value,row,index){
            var a = row.nama_approval2konsumsi;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve2konsumsi)===2){
                a += '<span style="color:#0062c2;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve22konsumsi+'</span>'
            } else if(parseInt(row.approve2konsumsi)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject2konsumsi+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }

        function approval3nyakonsumsi(value,row,index){
            var a = row.nama_approval3konsumsi;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve3konsumsi)===2){
                a += '<span style="color:#0062c2;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve32konsumsi+'</span>'
            } else if(parseInt(row.approve3konsumsi)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject3konsumsi+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }
        
        function getdatapegawai(){
            var nipnya = $("#nipkonsumsi").textbox('getValue');
            var idnya = $("#idkonsumsi").val();
            //alert(nipnya);
            $.ajax({
                type : "POST",
                url  : "<?=$foldernya;?>get_datapegawai.php",
                dataType : "JSON",
                data : {"nip": nipnya,"id": idnya},
                cache:false,
                success: function(data){
                    //alert(data);
                    $.each(data,function(){
                        $("#namakonsumsi").textbox('setValue',data.nama);
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,konsumsi,index){
			if (konsumsi.statuskonsumsi == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,konsumsi,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,konsumsi){
            if(val==="" || val===NaN){
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

        function formatrp3(val,konsumsi){
            return number_format3(val,3,',','.');
        };
        function number_format3(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }

        function formatrp4(val,konsumsi){
            return number_format4(val,2,',','.');
        };
        function number_format4(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        /*
        function onSelectregionalkonsumsicari(){
            var nilai1 = $('#kd_regionalkonsumsicari').combobox('getValue');
            var url2 = 'get_unitkonsumsicari.php?kd_regional='+nilai1;
            $('#kd_unitkonsumsicari').combobox('enable');
            $('#kd_unitkonsumsicari').combobox('clear'); 
            $('#kd_unitkonsumsicari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:10px;padding-bottom:3px;vertical-align: top;';
		}

		function styler2(value,row,index){
            return 'padding-top:0px;padding-bottom:3px;vertical-align: top;';
		}

	</script>
    <script type="text/javascript">
    $(function(){
        $.extend($.fn.textbox.methods, {
        	show: function(jq){
        		return jq.each(function(){
        			$(this).next().show();
        		})
        	},
        	hide: function(jq){
        		return jq.each(function(){
        			$(this).next().hide();
        		})
        	}
        });
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $("#dgkonsumsi").datagrid({
            
        });
    });
    </script>
    <table id="dgkonsumsi" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_konsumsi.php" pageSize="20"        
    		toolbar="#toolbarkonsumsi" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<th field="aksikonsumsi" width="90" align="center" halign="center" data-options="formatter:aksikonsumsi,styler:styler1">Aksi</th>
    			<th field="pengajuannyakonsumsi" width="200" align="center" halign="center" data-options="formatter:pengajuannyakonsumsi,styler:styler1">Pengajuan</th>
    			<th field="pemesannyakonsumsi" width="200" align="left" halign="left" data-options="formatter:pemesannyakonsumsi,styler:styler1">Pemesan</th>
    			<th field="jenisnyakonsumsi" width="200" align="left" halign="left" data-options="formatter:jenisnyakonsumsi,styler:styler1">Jenis Acara</th>
    			<th field="uraiannyakonsumsi" width="300" align="left" halign="left" data-options="formatter:uraiannyakonsumsi,styler:styler1">Uraian Acara</th>
    			<th field="makanannyakonsumsi" width="200" align="left" halign="left" data-options="formatter:makanannyakonsumsi,styler:styler1">Rincian Makanan</th>
    			<th field="uraian_minumankonsumsi" width="200" align="left" halign="left" data-options="styler:styler1">Rincian Minuman</th>
                <th field="approval1nyakonsumsi" width="200" align="center" halign="center" data-options="formatter:approval1nyakonsumsi,styler:styler2">Approval Lvl 1</th>
                <th field="approval2nyakonsumsi" width="200" align="center" halign="center" data-options="formatter:approval2nyakonsumsi,styler:styler2">Approval Lvl 2</th>
                <th field="approval3nyakonsumsi" width="200" align="center" halign="center" data-options="formatter:approval3nyakonsumsi,styler:styler2">Approval Lvl 3</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarkonsumsi">
    	<div id="tbkonsumsi" style="padding:3px">            
            <table>
            <tr>
                <td>Periode Acara</td>
                <td>
                    <input class="easyui-datebox" id="tgl_awalkonsumsicari" name="tgl_awalkonsumsicari" editable="false" value="<?=date('Y-m-01');?>" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                </td>
                <td>s.d</td>
                <td>
                    <input class="easyui-datebox" id="tgl_akhirkonsumsicari" name="tgl_akhirkonsumsicari" editable="false" value="<?=date('Y-m-d');?>" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                </td>
                <td>Pemesan</td>
                <td>
                    <input class="easyui-textbox" id="nipkonsumsicari" name="nipkonsumsicari" data-options="required:false" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchkonsumsi()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addkonsumsi()" style="min-width:90px;">Pengajuan Izin</a>
                </td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgkonsumsi" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;top:40px;"
    		closed="true" buttons="#dlg-buttonskonsumsi">
    	<form id="fmkonsumsi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idkonsumsi" name="idkonsumsi">
            <table>            
                <tr>
                    <td>
                        <div style="color:red;font-size:10.5px !important;width:360px;">*) Untuk ijin sakit lebih dari 2 hari, wajib melampirkan surat keterangan dokter</div>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Nip</label></div>
                        <input class="easyui-textbox" id="nipkonsumsi" name="nipkonsumsi" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 360px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namakonsumsi" name="namakonsumsi" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Jenis Izin</label></div>
                        <select id="jenis_ijinkonsumsi" name="jenis_ijinkonsumsi" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 360px;">
                            <option value="Ijin Sakit">Ijin Sakit</option>
                            <option value="Ijin Lainnya">Ijin Lainnya</option>                            
                        </select>                            
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Periode Izin</label></div>
                        <input class="easyui-datebox" id="tgl_awalkonsumsi" name="tgl_awalkonsumsi" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;s.d&nbsp;
                        <input class="easyui-datebox" id="tgl_akhirkonsumsi" name="tgl_akhirkonsumsi" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;=&nbsp;
                        <input class="easyui-numberbox" id="harikonsumsi" name="harikonsumsi" missingMessage="Harus di isi" data-options="required:true,min:0" style="width: 40px;"> &nbsp;hari
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Alasan Izin</label></div>
                        <input class="easyui-textbox" id="alasan_ijinkonsumsi" name="alasan_ijinkonsumsi" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;">
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <div class="labelfor"><label>Surat Keterangan Dokter</label></div>
                        <table>
                            <tr>
                                <td style="vertical-align:top;">                                
                                    <input type="hidden" id="extkonsumsi" name="extkonsumsi">
                                    <img id="evidenkonsumsi" src="" style="width:100px;height:100px">
                                    <div style="display:none">
                                        <input class="easyui-filebox" id="evidenkonsumsi2" name="evidenkonsumsi2" style="width:100px" data-options="
                                            prompt:'Choose a file...',
                                            onChange: function(value){
                                                var f = $(this).next().find('input[type=file]')[0];
                                                if (f.files && f.files[0]){
                                                    var name = $(this).filebox('getValue');
                                                    var ss = name.split('.');
                                                    var ext = ss.pop();
                                                    if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                        $('#extkonsumsi').val(ext);
                                                    } else {
                                                        $('#extkonsumsi').val('');
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = function(e){
                                                        if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                            $('#evidenkonsumsi').attr('src', e.target.result);
                                                        } else {
                                                            $('#evidenkonsumsi').attr('src', '');
                                                        }
                                                    }
                                                    reader.readAsDataURL(f.files[0]);
                                                }
                                            }">                                    
                                    </div>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    	</form>
        <script>
            $('#evidenkonsumsi').click(function(){
                $('#evidenkonsumsi2').next().find('.textbox-value')[0].click();
            });
        </script>

    </div>
    <div id="dlg-buttonskonsumsi">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savekonsumsi()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgkonsumsi').dialog('close')" style="min-width:90px">Batal</a>
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
        function addkonsumsi(){
            $('#dlgkonsumsi').dialog('open').dialog('setTitle','Input Izin Pegawai');
            $('#fmkonsumsi').form('clear');
            $("#nipkonsumsi").textbox('readonly',false);
            $("#evidenkonsumsi").attr('src', "");
            url = '<?=$foldernya;?>save_konsumsi.php';  
        } 
        function editkonsumsi(index){
            var row = $('#dgkonsumsi').datagrid('getRow', index);
    		if (row){
                $('#dlgkonsumsi').dialog('open').dialog('setTitle','Update Izin Pegawai');
                $('#fmkonsumsi').form('clear');
    			$('#fmkonsumsi').form('load',row);   
                $("#nipkonsumsi").textbox('readonly',true);
                $("#evidenkonsumsi").attr('src', row.evidenkonsumsi);
                url = '<?=$foldernya;?>update_konsumsi.php?id='+row.idkonsumsi;  
            }
        } 
    	function savekonsumsi(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmkonsumsi').form('submit',{
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
                    var result = eval('(' + result + ')');
                    if (result.errorMsg){
                        $.messager.alert('ERROR',result.errorMsg,'warning');
                        /*
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                        */
                    } else {
                        $('#dlgkonsumsi').dialog('close');
                        $('#dgkonsumsi').datagrid('reload');
                    }
                }
            });
    	}

    	function destroykonsumsi(index){ 
            var row = $('#dgkonsumsi').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('<?=$foldernya;?>destroy_konsumsi.php',{id:row.idkonsumsi},function(result){
                            if (result.success){
                                $('#dgkonsumsi').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function downloadabsensi(){
			var kelompoknya2 = $('#kelompokkonsumsicari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionkonsumsicari').combobox('getValue');
			var nama_regionnya = $('#kd_regionkonsumsicari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangkonsumsicari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangkonsumsicari').combobox('getText');            
			var kd_unitnya = $('#kd_unitkonsumsicari').combobox('getValue');
			var no_spknya = $('#no_spkkonsumsicari').textbox('getText');
            var tanggalnya = $('#tanggalkonsumsicari').datebox('getValue');
            window.open("download_konsumsi.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        $("#dgkonsumsi").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmkonsumsi{
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
    	.fitemupt{
    		margin-bottom:5px;
    	}
    	.fitemupt label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemupt input{
    		width:200px;
    	}
        .labelfor1 {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
        }
        .labelfor {
            font-weight:600;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        }
        .brxsmall {
            display: block;
            margin-bottom: 0.1em !important;
        }
        .brxsmall1 {
            display: block;
            margin-bottom: -.3em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.7em !important;
        }

    </style>
<?php
}
?>