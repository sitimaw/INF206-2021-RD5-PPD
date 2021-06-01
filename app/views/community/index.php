<div class="main-content">
	<section class="section">
		<h1 class="section-header">
			<div>Community</div>
		</h1>
		<div class="section-body">
			<div class="row mt-5">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>PPD VILLAGERS</h4> </div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Created At</th>
										<th>Status</th>
									</tr>
									<?php $no = 1 ?>
									<?php foreach ($data['allwarga'] as $warga) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $warga['username'] ?></td>
										<td><?= $warga['created_at'] ?></td>
										<td>
											<?php if ( in_array($warga['id'], $data['warga_aktif']) ) : ?>
												<div class="badge badge-success">Active</div>
											<?php else : ?>
												<div class="badge badge-danger">Not Active</div>
											<?php endif; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</table>
							</table>
							</div>
						</div>
						
						<div class="card-footer text-right">
							<nav class="d-inline-block">
								<ul class="pagination mb-0">
									<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a> </li>
									<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
									<li class="page-item"> <a class="page-link" href="#">2</a> </li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"> <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a> </li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>PPD COMMUNITIES</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Community</th>
										<th>Activities</th>
										<th>Member</th>
										<th>Join</th>
									</tr>
									<?php $no = 1 ?>
									<?php foreach ($data['communities'] as $community) : ?>
									<tr>
										<td width="5%"><?= $no++ ?></td>
										<td width="30%"><?= $community['nama'] ?></td>
										<td width="30%"><?= $community['kegiatan'] ?></td>
										<td>
											<?php foreach ($data['warga_komunitas'] as $join) : ?>
												<?php if($community['id'] == $join['id_komunitas']) : ?>
													<img alt="image" src="<?= BASEURL;?>/img/profile/<?= $join['profile'] ?>" class="rounded-circle" width="35" data-toggle="title" title="<?= $join['username'] ?>">
												<?php endif; ?>
											<?php endforeach; ?>
										</td>

										<td width="10%">
											<?php if( !in_array($community['id'], $data['komunitas_warga']) ) : ?>
												<a class="btn btn-action btn-secondary tombolJoinKomunitas" data-bs-toggle="modal" data-bs-target="#modalJoin" data-link-join="<?= $community['link_join']; ?>" data-id-warga="<?= $_SESSION['warga']['id'] ?>" data-id-komunitas="<?= $community['id']; ?>">Join</a>
											<?php else : ?>
												<a href="<?= BASEURL; ?>/community/batalJoin/<?= $data['warga']['id']; ?>/<?= $community['id']; ?>" class="btn btn-action btn-secondary">Batal Join</a>
											<?php endif; ?>
										</td>

									</tr>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="modalJoin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalJoinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalJoinLabel">Link Komunitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h5>Copy this link!</h5>
		<p><a href="#" class="tooltip-test" title="Tooltip"></a></p>

      </div>
      <div class="modal-footer">
		<form action="<?= BASEURL; ?>/community/join" method="post">
			<input type="hidden" name="id_warga" value="">
			<input type="hidden" name="id_komunitas" value="">
			<button type="submit" class="btn btn-primary">Join</button>
		</form>
      </div>
    </div>
  </div>
</div>