<div class="container-fulid">
	<h1 class="mt-4 mb-3">
		<?php echo $title; ?>
	</h1>
	<div class="row">
		<div class="col-lg-12 mb-4">
			<?php if (empty($oillist)): ?>

			<?php else: ?>
			<h3 id="proboil" class="mt-4" style="color: #ff4d50;">Машины на замену масла</h3>
			<table class="table table-bordered table-hover style=" font-size: 85% "">
				<thead>
					<tr>
						<!--<th class="align-middle text-center">Бренд</th>-->
						<th class="align-middle text-center">Модsель</th>
						<th class="align-middle text-center">Гос.№</th>
						<th class="align-middle text-center">Пробег</th>
						<th class="align-middle text-center">Масло</th>
						<th class="align-middle text-center">ГРМ</th>
						<th class="align-middle text-center">Редактирование</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($oillist as $val): ?>
					<tr>

						<!--бренд-->
						<!--<td style="padding:0px;" class="align-middle text-center"><img src="<?php echo $val['logo']; ?>" width="30" height="30">
						</td>-->
						<!--Модель-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['model']; ?>
						</td>
						<!--Гос.№-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['no']; ?>
						</td>
						<!--пробег-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['probeg']; ?>
						</td>

						<!--масло-->
						<?php if (($val['probeg']+800) > $val['oil']): ?>
						<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php else: ?>
							<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php endif; ?>

								<?php echo $val['oil']; ?>

							</td>

							<!--/масло-->

							<!--грм-->
							<?php if (($val['probeg']+800) > $val['grm']): ?>
							<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
								<?php else: ?>
								<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
									<?php endif; ?>

									<?php echo $val['grm']; ?>

								</td>
								<!--/грм-->

								<!--Редактирование-->
								<td style="padding:0px;" class="align-middle text-center">
									<a data-toggle="modal" data-target="#modal_red_oil_<?php echo $val['id']; ?>" class="btn btn-success" style="color: #FFFFFF"><i class="material-icons">
edit</i></a>
								




									<div class="modal fade" id="modal_red_oil_<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
												




												</div>
												<div class="modal-body">
													<form action="/account/car" method="post">
														<div class="row">
															<div class="col-12">
																<input type="hidden" name="type" value="red">
																<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
																<input type="hidden" value="<?php echo $val['grm']; ?>" name="grm">
																<input type="hidden" value="<?php echo $val['model']; ?>" name="model">
																<input type="hidden" value="<?php echo $val['no']; ?>" name="no">
																<input type="hidden" value="<?php echo $val['vin']; ?>" name="vin">
																<input type="hidden" value="<?php echo $val['sts']; ?>" name="sts">
																<input type="hidden" value="<?php echo $val['a7']; ?>" name="a7">
																<input type="hidden" value="<?php echo $val['a6']; ?>" name="a6">
																<input type="hidden" value="<?php echo $val['b7']; ?>" name="b7">
																<input type="hidden" value="<?php echo $val['btime']; ?>" name="btime">
																<input type="hidden" value="<?php echo $val['ad']; ?>" name="ad">
																<input type="hidden" value="<?php echo $val['probeg']; ?>" name="probeg">
																<input type="hidden" value="<?php echo $val['year']; ?>" name="year">
																<div class="control-group form-group">
																	<div class="controls">
																		<label>Пробег замены масла</label>
																		<input type="text" class="form-control" name="oil" value="<?php echo $val['oil']; ?>">
																	</div>
																</div>
																<button type="submit" class="btn btn-success">Применить</button>
																<button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Отмена</button>

															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif; ?>


			<?php if (empty($grmlist)): ?>

			<?php else: ?>
			<h3 id="probgrm" class="mt-4" style="color: #ff4d50;">Машины на замену ГРМ</h3>
			<table class="table table-bordered table-hover style=" font-size: 85% "">
				<thead>
					<tr>
						<!--<th class="align-middle text-center">Бренд</th>-->
						<th class="align-middle text-center">Модель</th>
						<th class="align-middle text-center">Гос.№</th>
						<th class="align-middle text-center">Пробег</th>
						<th class="align-middle text-center">Масло</th>
						<th class="align-middle text-center">ГРМ</th>
						<th class="align-middle text-center">Редактирование</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($grmlist as $val): ?>
					<tr>

						<!--бренд-->
						<!--<td style="padding:0px;" class="align-middle text-center"><img src="<?php echo $val['logo']; ?>" width="30" height="30">
						</td>-->
						<!--Модель-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['model']; ?>
						</td>
						<!--Гос.№-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['no']; ?>
						</td>
						<!--пробег-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['probeg']; ?>
						</td>

						<!--масло-->
						<?php if (($val['probeg']+800) > $val['oil']): ?>
						<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
							<?php else: ?>
							<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
								<?php endif; ?>

								<?php echo $val['oil']; ?>

							</td>

							<!--/масло-->

							<!--грм-->
							<?php if (($val['probeg']+800) > $val['grm']): ?>
							<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
								<?php else: ?>
								<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
									<?php endif; ?>

									<?php echo $val['grm']; ?>

								</td>
								<!--/грм-->

								<!--Редактирование-->
								<td style="padding:0px;" class="align-middle text-center">
									<a data-toggle="modal" data-target="#modal_red_grm_<?php echo $val['id']; ?>" class="btn btn-success" style="color: #FFFFFF"><i class="material-icons">
edit</i></a>
								




									<div class="modal fade" id="modal_red_grm_<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
												




												</div>
												<div class="modal-body">
													<form action="/account/car" method="post">
														<div class="row">
															<div class="col-12">
																<input type="hidden" name="type" value="red">
																<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
																<input type="hidden" value="<?php echo $val['oil']; ?>" name="oil">
																<input type="hidden" value="<?php echo $val['model']; ?>" name="model">
																<input type="hidden" value="<?php echo $val['no']; ?>" name="no">
																<input type="hidden" value="<?php echo $val['vin']; ?>" name="vin">
																<input type="hidden" value="<?php echo $val['sts']; ?>" name="sts">
																<input type="hidden" value="<?php echo $val['a7']; ?>" name="a7">
																<input type="hidden" value="<?php echo $val['a6']; ?>" name="a6">
																<input type="hidden" value="<?php echo $val['b7']; ?>" name="b7">
																<input type="hidden" value="<?php echo $val['btime']; ?>" name="btime">
																<input type="hidden" value="<?php echo $val['ad']; ?>" name="ad">
																<input type="hidden" value="<?php echo $val['probeg']; ?>" name="probeg">
																<input type="hidden" value="<?php echo $val['year']; ?>" name="year">
																<div class="control-group form-group">
																	<div class="controls">
																		<label>Пробег замены ГРМ</label>
																		<input type="text" class="form-control" name="grm" value="<?php echo $val['grm']; ?>">
																	</div>
																</div>
																<button type="submit" class="btn btn-success">Применить</button>
																<button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Отмена</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif; ?>



			<?php if (empty($list)): ?>
			<p>Машин нет</p>
			<div class="row pb-3 ml-2">
				<a data-toggle="modal" data-target="#modal_add" class="btn btn-success px-1 py-0" style="color: #FFFFFF; font-size: 48px;"><i class="material-icons">
add</i></a>
			



			</div>
			<?php else: ?>
			<div class="row pb-3 ml-2"><a data-toggle="modal" data-target="#modal_add" class="btn btn-success px-1 py-0" style="color: #FFFFFF; font-size: 48px;"><i class="material-icons md-48">
add</i></a>
			



			</div>
			<table class="table table-bordered table-hover style=" font-size: 85% "">
				<thead>
					<tr>
						<th class="align-middle text-center">Бренд</th>
						<th class="align-middle text-center">Модель</th>
						<th class="align-middle text-center">Гос.№</th>
						<th class="align-middle text-center">Пробег</th>
						<th class="align-middle text-center">Масло</th>
						<th class="align-middle text-center">ГРМ</th>
						<th class="align-middle text-center">Редактирование</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $val): ?>
					<tr>

						<!--бренд-->
						<td style="padding:0px;" class="align-middle text-center"><img src="<?php echo $val['logo']; ?>" width="30" height="30">
						</td>
						<!--Модель-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['model']; ?>
						</td>
						<!--Гос.№-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['no']; ?>
						</td>
						<!--пробег-->
						<td style="padding:0px;" class="align-middle text-center">
							<?php echo $val['probeg']; ?>
						</td>

						<!--масло-->
						<?php if (($val['probeg']+800) > $val['oil']): ?>
						<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php else: ?>
							<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php endif; ?>

								<?php echo $val['oil']; ?>

						</td>

							<!--/масло-->

							<!--грм-->
						<?php if (($val['probeg']+800) > $val['grm']): ?>
							<td style="padding:0px; background-color: #FF4D50" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php else: ?>
								<td style="padding:0px;" class="align-middle text-center py-1" style="font-weight: normal;">
						<?php endif; ?>

									<?php echo $val['grm']; ?>

						</td>
								<!--/грм-->

								<!--Редактирование-->
								<td style="padding:0px;" class="align-middle text-center">

									<a data-toggle="modal" data-target="#modal_red_full_<?php echo $val['id']; ?>" class="btn btn-secondary" style="color: #FFFFFF">Подробнее</a>
									<div class="modal fade" id="modal_red_full_<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
												

												</div>
												<div class="modal-body">
													<table class="table">
														<tbody>
															<tr>
																<td>Модель</td>
																<td><?php echo $val['model']; ?></td>
															</tr>
															<tr>
																<td>Гос.№</td>
																<td><?php echo $val['no']; ?></td>
															</tr>
															<tr>
																<td>Год</td>
																<td><?php echo $val['year']; ?></td>
															</tr>
															<tr>
																<td>№ СТС</td>
																<td><?php echo $val['sts']; ?></td>
															</tr>
															<tr>
																<td>Пробег</td>
																<td><?php echo $val['probeg']; ?></td>
															</tr>
															<tr>
																<td>Замена масла</td>
																<td><?php echo $val['oil']; ?></td>
															</tr>
															<tr>
																<td>Замена ГРМ</td>
																<td><?php echo $val['grm']; ?></td>
															</tr>
															<tr>
																<td>Цена 7:0</td>
																<td><?php echo $val['a7']; ?></td>
															</tr>
															<tr>
																<td>Цена 6:1</td>
																<td><?php echo $val['a6']; ?></td>
															</tr>
															<tr>
																<td>Цена под выкуп</td>
																<td><?php echo $val['b7']; ?></td>
															</tr>
															<tr>
																<td>Время выкупа</td>
																<td><?php echo $val['btime']; ?></td>
															</tr>
															<tr>
																<td>Владелец</td>
																<td><?php echo $val['ad']; ?></td>
															</tr>
															<tr>
																<td>VIN</td>
																<td><?php echo $val['vin']; ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										</div>


										<a data-toggle="modal" data-target="#modal_red_<?php echo $val['id']; ?>" class="btn btn-success" style="color: #FFFFFF"><i class="material-icons">edit</i></a>
										<div class="modal fade" id="modal_red_<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
													




													</div>
													<div class="modal-body">
														<form action="/account/car" method="post">
															<div class="row">
																<div class="col-12">
																	<input type="hidden" name="type" value="red">
																	<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Модель</label>
																			<input type="text" class="form-control" name="model" value="<?php echo $val['model']; ?>">
																			<p class="help-block"></p>
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Гос.№</label>
																			<input type="text" class="form-control" name="no" value="<?php echo $val['no']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Год выпуска</label>
																			<input type="text" class="form-control" name="year" value="<?php echo $val['year']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>№ СТС</label>
																			<input type="text" class="form-control" name="sts" value="<?php echo $val['sts']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>VIN</label>
																			<input type="text" class="form-control" name="vin" value="<?php echo $val['vin']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Пробег</label>
																			<input type="text" class="form-control" name="probeg" value="<?php echo $val['probeg']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Пробег до замены масла</label>
																			<input type="text" class="form-control" name="oil" value="<?php echo $val['oil']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Пробег до замены ГРМ</label>
																			<input type="text" class="form-control" name="grm" value="<?php echo $val['grm']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Владелец</label>
																			<input type="text" class="form-control" name="ad" value="<?php echo $val['ad']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Стоимость аренды 7:0</label>
																			<input type="text" class="form-control" name="a7" value="<?php echo $val['a7']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Стоимость аренды 6:0</label>
																			<input type="text" class="form-control" name="a6" value="<?php echo $val['a6']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Стоимость аренды под выкуп</label>
																			<input type="text" class="form-control" name="b7" value="<?php echo $val['b7']; ?>">
																		</div>
																	</div>
																	<div class="control-group form-group">
																		<div class="controls">
																			<label>Срок выкупа</label>
																			<input type="text" class="form-control" name="btime" value="<?php echo $val['btime']; ?>">
																		</div>
																	</div>
																	<button type="submit" class="btn btn-success">Применить</button>
																	<button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Отмена</button>

																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<a data-toggle="modal" data-target="#modal_ob_<?php echo $val['id']; ?>" class="btn btn-danger" style="color: #FFFFFF">
<i class="material-icons">
delete</i></a>
									




										<div class="modal fade" id="modal_ob_<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Удаление</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
													




													</div>
													<div class="modal-body">
														<form action="/account/car" method="post">
															<div class="row">
																<div class="col-12">
																	<p>Точно?</p>
																	<input type="hidden" name="type" value="del">
																	<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
																	<button type="submit" class="btn btn-danger">Удалить</button>
																	<button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Не</button>

																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
								</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo $pagination; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				




				</div>
				<div class="modal-body">

					<form action="/account/car" method="post">
						<input type="hidden" name="type" value="add">
						<div class="control-group form-group">
							<div class="controls">
								<label>Модель</label>
								<input type="text" class="form-control" name="model">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Гос.№</label>
								<input type="text" class="form-control" name="no">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>№ СТС</label>
								<input type="text" class="form-control" name="vin">
							</div>
						</div>
						<label>Иконка</label>
						<div class="row no-gutters">
							<p><input name="logo" type="radio" value="/img/cars/kia.png" checked> <img src="/img/cars/kia.png" width="32" height="32">
							</p>
						</div>
						<div class="row no-gutters">
							<p><input name="logo" type="radio" value="/img/cars/lada.png"> <img src="/img/cars/lada.png" width="32" height="32">
							</p>
						</div>
						<div class="row no-gutters">
							<p><input name="logo" type="radio" value="/img/cars/reno.png"> <img src="/img/cars/reno.png" width="32" height="32">
							</p>
						</div>
						<div class="row pt-3">
							<div class="col-12">
								<button type="submit" class="btn btn-dark">Добавить</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>