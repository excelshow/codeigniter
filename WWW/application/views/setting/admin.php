<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17 0017
 * Time: 21:30
 * type : view
 * content : 管理员资料设置
 */
?>
<div class="main-content">
	<div class="main-content-inner">
		<!-- #section:basics/content.breadcrumbs -->
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php url('admin')?>">Home</a>
				<li>
					<a href="<?php url('setting')?>"><?php echo 'setting'?></a>
				</li>
				<li class="active">
					<?php echo 'admin'?>
				</li>
			</ul><!-- /.breadcrumb -->
        </div>
			<div class="col-xs-12 col-sm-3 center">
				<div>
					<!-- #section:pages/profile.picture -->
					<span class="profile-picture">
													<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="<?php echo base_url()?>/assets/avatars/user.jpg">
												</span>

					<!-- /section:pages/profile.picture -->
					<div class="space-4"></div>

					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
						<div class="inline position-relative">
							<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
								<i class="ace-icon fa fa-circle light-green"></i>
								&nbsp;
								<span class="white">管理员</span>
							</a>

							<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
								<li class="dropdown-header"> Change Status </li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-circle green"></i>
										&nbsp;
										<span class="green">Available</span>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-circle red"></i>
										&nbsp;
										<span class="red">Busy</span>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-circle grey"></i>
										&nbsp;
										<span class="grey">Invisible</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="space-6"></div>

				<!-- #section:pages/profile.contact -->
				<div class="profile-contact-info">
					<button class="btn btn-primary"  onclick="$('#mymodal').modal('show')">修改管理员资料</button>
					<!-- /section:custom/extra.grid -->
				<div class="hr hr16 dotted"></div>
                    <div class="modal" id="mymodal" data-backdrop="static">

                        <div class="modal-dialog">

                            <div class="modal-content" id="mymodal_content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">管理员ID：<?php echo $admin[0]['id']?></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php url('setting/set_admin')?>" method="post"><h4>用户名</h4>
                                        <input type="text" name="username" value="<?php echo $admin[0]['username']?>">
                                        <h4>修改密码</h4>
                                        新密码:<input type="password" name="password">
                                        确认新密码:<input type="password" name="repassword">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="submit" class="btn btn-primary" >确认</button>
                                </div></form>

                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                    </div><!-- /.modal -->
			</div>

