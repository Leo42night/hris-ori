<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if (!$userhris){
    echo "<br/>&nbsp;Anda tidak memiliki akses<br/>";    
} else {
    include "koneksi.php";
    ?>
	<div style="width:380px; padding:10px; border:2px solid #337ab7;margin-top:20px;margin-left:20px;">
	    <form id="ffpass" method="post">
	    	<table cellpadding="5">
	    		<tr>
	    			<td style="white-space:nowrap;">Password Lama</td>
	    			<td><input class="easyui-textbox" type="text" id="pass_lama" name="pass_lama" missingMessage="Masukkan password lama" data-options="required:true" style="width: 250px;height:25px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>&nbsp;</td>
	    			<td>&nbsp;</td>
	    		</tr>
	    		<tr>
	    			<td style="white-space:nowrap;">Password Baru</td>
	    			<td><input class="easyui-textbox" type="text" id="pass_baru" name="pass_baru" missingMessage="Masukkan password baru" data-options="required:true" style="width: 250px;height:25px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>Konfirmasi</td>
	    			<td><input class="easyui-textbox" type="text" id="pass_baru2" name="pass_baru2" missingMessage="Ketik ulang password baru" data-options="required:true" style="width: 250px;height:25px;"></input></td>
	    		</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<span style="color:red;">*) Password harus terdiri dari huruf besar, kecil, angka dan karakter khusus.<br/>Jumlah karakter 8-15</span>
					</td>
				</tr>

	    	</table>
	    </form>
	    <div style="text-align:left;padding:2px 0 2px 119px">
            <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="gantiPass()" style="min-width:90px">Simpan</a>
            <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c5" iconCls="fa fa-times" onclick="clearForm()" style="min-width:90px">Cancel</a>
	    </div>
    </div>
	<script>
    	function gantiPass(){
            var nilai1 = $('#pass_baru').textbox('getValue');
            var nilai2 = $('#pass_baru2').textbox('getValue');
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            if(nilai1.match(decimal) && nilai2.match(decimal)){
				if(nilai1===nilai2){
					$.messager.progress({height:75, text:'Proses simpan data...'});               
					$('#ffpass').form('submit',{
						url: 'save_pass.php',
						onSubmit: function(){
							//return $(this).form('enableValidation').form('validate');
							var v=$(this).form('validate');
							if(!v) $.messager.progress('close');
							return v;
						},
						success: function(result){	
							//alert(result);	
							$.messager.progress('close');			
							var result = eval('('+result+')');
							if (result.success!==true){
								$.messager.show({
									title: 'Error',
									msg: result.errorMsg
								});
							} else {
								window.location="logout.php";
							}
						}
					});
				} else {
					alert('Konfirmasi password tidak sama');
					return false;
				}
			} else {
                alert('Format password salah');
                return false;
			}
            
    	}
		function submitForm(){
			$('#ffpass').form('submit');
		}
		function clearForm(){
			$('#ffpass').form('clear');
		}
	</script>

<?php    
}
?>