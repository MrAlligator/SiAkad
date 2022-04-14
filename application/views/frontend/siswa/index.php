<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
                <label>Pilih Kelas</label>
                <div class="row"> 
				    <div class="col-lg-2"> 
					    <select class="form-control" name="kelas">
                            <option value="">Kelas</option>
	    					<option value="X">X</option>  
    						<option value="XI">XI</option>  
							<option value="XII">XII</option>
						</select>
                    </div>
                    <div class="col-lg-3"> 
				        <button class="btn btn-success" type="submit">Filter</button>
                    </div>
                </div>
<br>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">No</div>
							<div class="country">Nama</div>
							<div class="visit">NIS</div>
							<div class="country">Jenis Kelamin</div>
							<div class="visit">Agama</div>
							<div class="percentage">Tempat, Tanggal Lahir</div>
							<div class="percentage">Alamat</div>
						</div>
                        <?php foreach($dataSiswa as $dataSiswa):?>
						<div class="table-row">
							<div class="serial"></div>
							<div class="country"><a href=""><?=$dataSiswa->nama?></a></div>
							<div class="visit">Ya</div>
							<div class="country">Ya</div>
							<div class="visit">Ya</div>
							<div class="percentage">Ya</div>
							<div class="percentage">Ya</div>
						</div>
                        <?php endforeach?>
                    </div>
				</div>
			</div>
		</div>
	</div>