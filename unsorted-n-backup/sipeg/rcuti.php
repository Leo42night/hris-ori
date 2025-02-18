<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/"
    ?>
	<script type="text/javascript">                     
		function doSearchrcuti(){
            //kosongkan();
            $('#dgrcuti').datagrid('load',{                
				niprcuticari: $('#niprcuticari').textbox('getValue'),			
			});                        
		}
        
        $('#kd_unitrcuticari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkrcuticari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokrcuticari(){
            var nilai1 = $('#kelompokrcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionrcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangrcuticari').combobox('getValue');
            var url1 = 'get_spkrcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkrcuticari').combogrid('clear');
            $('#no_spkrcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrcuticari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionrcuticari(){
            var nilai1 = $('#kelompokrcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionrcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangrcuticari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkrcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangrcuticari').combobox('clear');
            $('#kd_cabangrcuticari').combobox('reload',url2);
            $('#kd_cabangrcuticari').combobox('setValue','000');

            $('#kd_unitrcuticari').combobox('clear');
            $('#kd_unitrcuticari').combobox('reload',url3);
            $('#kd_unitrcuticari').combobox('setValue','semua');
            /*
            $('#no_spkrcuticari').combogrid('clear');
            $('#no_spkrcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrcuticari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangrcuticari(){
            var nilai1 = $('#kelompokrcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionrcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangrcuticari').combobox('getValue');
            //var url1 = 'get_spkrcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitrcuticari').combobox('clear');
            $('#kd_unitrcuticari').combobox('reload',url2);
            $('#kd_unitrcuticari').combobox('setValue','semua');
            /*
            $('#no_spkrcuticari').combogrid('clear');
            $('#no_spkrcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrcuticari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenisrcuticari').combobox('getValue');
            var nilai2 = $('#kd_projectrcuticari').combobox('getValue');
            var url2 = 'get_unitrcuticari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitrcuticari').combobox('enable');
            //$('#kd_unitrcuticari').combobox('clear'); 
            $('#kd_unitrcuticari').combogrid('clear');
            $('#kd_unitrcuticari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksircuti(value,row,index){
            if(parseInt(row.approve2rcuti)!==2){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editrcuti(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroyrcuti(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            }
            return a+b;
        }  

        function namajabatanrcuti(value,row,index){
            var a = row.namarcuti;
            a += '<br/><span style="font-size:10px !important;color:blue;">'+row.jabatanrcuti+'</span>';
            return a;
        }  

        function kontakrcuti(value,row,index){
            var a = row.alamatrcuti;
            a += '<br/><span style="font-size:10px !important;color:#1E90FF;">'+row.teleponrcuti+'</span>';
            return a;
        }  

        function keperluanrcutinya(value,row,index){
            var a = '<span style="color:#0062c2;">'+row.jenis_cutircuti+'</span>';
            a += '<span class="brxsmall1"></span>'
            a += row.keperluan_cutircuti;
            return a;
        }

        function approvalrcuti(value,row,index){
            var a = row.nama_approval1rcuti;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve1rcuti)===2){
                a += '<span style="color:#0062c2;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve12rcuti+'</span>'
            } else if(parseInt(row.approve1rcuti)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject1rcuti+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }
        
        function cekjenis(){ 
            var jenis_cutinya = $("#jenis_cutircuti").combobox('getValue'); 
            var sisa_cuti = $("#sisarcuti").val(); 
            var hari = $("#harircuti").numberbox('getValue');
            //alert(jenis_cutinya+" "+sisa_cuti+" "+hari);
            if(jenis_cutinya==="01"){ 
                $("#divinfo").css("display","block");
                $("#harircuti").numberbox({max:parseInt(sisa_cuti)});
                if(parseInt(hari)>parseInt(sisa_cuti)){
                    $("#harircuti").numberbox("setValue",sisa_cuti);
                } else {
                }
            } else {
                $("#divinfo").css("display","none");
                $("#harircuti").numberbox({max:9999});
            }
        }        
        
        function getdatapegawai(){            
            var jenis_cutinya = $("#jenis_cutircuti").combobox('getValue');
            var nipnya = $("#niprcuti").textbox('getValue');
            var idnya = $("#idrcuti").val();
            //alert(nipnya+" "+idnya);
            $.ajax({
                type : "POST",
                url  : "<?=$foldernya;?>get_datapegawaicuti.php",
                dataType : "JSON",
                data : {"nip": nipnya,"id": idnya},
                cache:false,
                success: function(data){
                    //$("#divinfo").css("display","block");
                    $.each(data,function(){
                        $("#namarcuti").textbox('setValue',data.nama);
                        $("#sisarcuti").val(data.sisa_cuti);
                        $("#lbl1").text('Periode Cuti : '+data.batas_awal2+' s.d '+data.batas_akhir2);
                        $("#lbl2").text('Sisa Cuti : '+data.sisa_cuti+' hari');
                        if(jenis_cutinya==="01"){
                            $("#harircuti").numberbox({max:data.sisa_cuti});
                        } else {
                            $("#harircuti").numberbox({max:9999});
                        }
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,rcuti,index){
			if (rcuti.statusrcuti == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,rcuti,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,rcuti){
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

        function formatrp3(val,rcuti){
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

        function formatrp4(val,rcuti){
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
        function onSelectregionalrcuticari(){
            var nilai1 = $('#kd_regionalrcuticari').combobox('getValue');
            var url2 = 'get_unitrcuticari.php?kd_regional='+nilai1;
            $('#kd_unitrcuticari').combobox('enable');
            $('#kd_unitrcuticari').combobox('clear'); 
            $('#kd_unitrcuticari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}

		function styler2(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
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
        $("#dgrcuti").datagrid({
            
        });
    });
    </script>
    <table id="dgrcuti" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_rcuti.php" pageSize="20"        
    		toolbar="#toolbarrcuti" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<!--<th rowspan="2" field="norcuti" width="50" align="center" halign="center">No</th>-->
    			<th rowspan="2" field="aksircuti" width="90" align="center" halign="center" data-options="formatter:aksircuti,styler:styler1">Aksi</th>
    			<th rowspan="2" field="niprcuti" width="120" align="center" halign="center" data-options="styler:styler1">Nip</th>
    			<th rowspan="2" field="namarcuti" width="200" align="left" halign="center" data-options="styler:styler1">Nama Pegawai</th>
    			<th rowspan="2" field="tgl_pengajuan2rcuti" width="110" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Pengajuan</th>
                <th colspan="3">Periode Cuti</th>
    			<th rowspan="2" field="keperluanrcutinya" width="200" align="left" halign="center" data-options="formatter:keperluanrcutinya,styler:styler1">Keperluan Cuti</th>
    			<th rowspan="2" field="kontakrcuti" width="200" align="left" halign="center" data-options="formatter:kontakrcuti,styler:styler1">Kontak Selama Cuti</th>
                <th rowspan="2" field="approvalrcuti" width="300" align="left" halign="center" data-options="formatter:approvalrcuti,styler:styler2">Status Approval</th>
    		</tr>
            <tr>
    			<th field="tgl_awal2rcuti" width="100" align="center" halign="center" data-options="styler:styler1">Awal</th>
    			<th field="tgl_akhir2rcuti" width="100" align="center" halign="center" data-options="styler:styler1">Akhir</th>
                <th field="harircuti" width="50" align="center" halign="center" data-options="styler:styler1">Hari</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarrcuti">
    	<div id="tbrcuti" style="padding:3px">            
            <table>
            <tr>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niprcuticari" name="niprcuticari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchrcuti()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" onclick="addrcuti()" style="min-width:90px;">Pengajuan Cuti</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="downloadrcuti()" style="min-width:90px;">Download Cuti</a>
                </td>
            </tr>
            </table>
            
            <table>
            <tr>
                <td>
                    <div id="divproses1"></div>
                </td>
            </tr>            
            </table>
    	</div>
    </div>
    
    <div id="dlgrcuti" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;top:40px;"
    		closed="true" buttons="#dlg-buttonsrcuti">
    	<form id="fmrcuti" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idrcuti" name="idrcuti">
            <input type="hidden" id="sisarcuti" name="sisarcuti">
            <table>            
                <tr>
                    <td>
                        <div id="divinfo" style="display:none;">
                            <label id="lbl1" style="color:blue;"></label>
                            <span class="brxsmall"></span>
                            <label id="lbl2" style="color:red;"></label>
                        </div>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Jenis Cuti</label></div>
                            <select id="jenis_cutircuti" name="jenis_cutircuti" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 360px;">
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                            </select>                            
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>NIP</label></div>
                            <input class="easyui-textbox" id="niprcuti" name="niprcuti" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 360px;">
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Nama</label></div>
                            <input class="easyui-textbox" id="namarcuti" name="namarcuti" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;" readonly>
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Periode Cuti</label></div>
                            <input class="easyui-datebox" id="tgl_awalrcuti" name="tgl_awalrcuti" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                            &nbsp;s.d&nbsp;
                            <input class="easyui-datebox" id="tgl_akhirrcuti" name="tgl_akhirrcuti" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                            &nbsp;=&nbsp;
                            <input class="easyui-numberbox" id="harircuti" name="harircuti" missingMessage="Harus di isi" data-options="required:true,min:0" style="width: 40px;"> &nbsp;hari
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Keperluan Cuti</label></div>
                            <input class="easyui-textbox" id="keperluan_cutircuti" name="keperluan_cutircuti" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;">
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td style="font-weight:bold;color:#1E90FF;padding-top:10px;">Kontrak Selama Cuti</td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Alamat</label></div>
                        <input class="easyui-textbox" id="alamatrcuti" name="alamatrcuti" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Telepon</label></div>
                        <input class="easyui-textbox" id="teleponrcuti" name="teleponrcuti" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsrcuti">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savercuti()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrcuti').dialog('close')" style="min-width:90px">Batal</a>
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
        function addrcuti(){
            $('#dlgrcuti').dialog('open').dialog('setTitle','Input Cuti Pegawai');
            $('#fmrcuti').form('clear');
            $("#niprcuti").textbox('readonly',false);
            $("#evidenrcuti").attr('src', "");
            $("#divinfo").css("display","none");
            url = '<?=$foldernya;?>save_rcuti.php';  
        } 
        function editrcuti(index){
            var row = $('#dgrcuti').datagrid('getRow', index);
    		if (row){
                $('#dlgrcuti').dialog('open').dialog('setTitle','Update Cuti Pegawai');
                $('#fmrcuti').form('clear');
    			$('#fmrcuti').form('load',row);   
                $("#niprcuti").textbox('readonly',true);
                url = '<?=$foldernya;?>update_rcuti.php?id='+row.idrcuti;  
            }
        } 
    	function savercuti(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmrcuti').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    // alert(result);
                    $.messager.progress('close');
                    var result = eval('(' + result + ')');
                    if (result.errorMsg){
                        $.messager.alert('ERROR',result.errorMsg,'warning');
                    } else {
                        $('#dlgrcuti').dialog('close');
                        $('#dgrcuti').datagrid('reload');
                    }
                }
            });
    	}

    	function destroyrcuti(index){ 
            var row = $('#dgrcuti').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('<?=$foldernya;?>destroy_rcuti.php',{id:row.idrcuti},function(result){
                            // alert(result);
                            if (result.success){
                                $('#dgrcuti').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function downloadrcuti(){
            // var tanggalnya = $('#tanggalrcuticari').datebox('getValue');
            window.open("<?=$foldernya;?>download_rcuti.php","_blank");
        } 

        $("#dgrcuti").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrcuti{
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