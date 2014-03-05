<?php /* Smarty version 2.6.27, created on 2014-03-05 13:57:36
         compiled from default/job/jobsearchbox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/job/jobsearchbox.html', 6, false),)), $this); ?>
<div id="job-search-box">
		<div class="job-search-tab">
			<ul>
				<!--<li><a href="#box_underi" rel="job-learn" class="notyet">Học tập</a></li>-->
				
				<li <?php if ($_GET['do'] == 'employee'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_the_url(array('module' => 'employees'), $this);?>
" rel="job-learn" class="">Hồ sơ ứng viên</a></li>
				<li <?php if ($_GET['do'] == 'job'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_the_url(array('module' => 'jobs'), $this);?>
" rel="job-learn">Việc làm</a></li>
				<li <?php if ($_GET['do'] == 'studypost'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_the_url(array('module' => 'studypost'), $this);?>
" rel="job-study">Học tập</a></li>
			</ul>
			<div class="tab-content">
				<div id="job-learn" class="tab-item active">
						
				    <?php if ($_GET['do'] != 'studypost'): ?>
					<form action="<?php if ($_GET['do'] == 'job'): ?><?php echo smarty_function_the_url(array('module' => 'jobs'), $this);?>
<?php endif; ?><?php if ($_GET['do'] == 'employee'): ?><?php echo smarty_function_the_url(array('module' => 'employees'), $this);?>
<?php endif; ?>" methos="get">
						<input type="hidden" name="do" value="<?php echo $_GET['do']; ?>
" />
						<?php if ($_GET['total_count']): ?><input type="hidden" name="total_count" value="<?php echo $_GET['total_count']; ?>
" /><?php endif; ?>
						<?php if ($_GET['pos']): ?><input type="hidden" name="pos" value="<?php echo $_GET['pos']; ?>
" /><?php endif; ?>
						<input type="hidden" name="type" value="<?php echo $_GET['type']; ?>
" />
						
						<input type="text" placeholder="Nhập chức danh, vị trí công việc,..." name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
"/>
						<select name="indust">
							<option value="0">Tất cả ngành nghề</option>
							<?php echo $this->_tpl_vars['JobindustOptions']; ?>
							
						</select>
						
						<select name="area">
							<option value="0">Tất cả địa điểm</option>
							<?php echo $this->_tpl_vars['AreaOptions']; ?>

						</select>
						
						<input type="submit" value="Tìm kiếm" />
					</form>
				    <?php else: ?>
					<form action="<?php echo smarty_function_the_url(array('module' => 'studypost'), $this);?>
" methos="get">
						<input type="hidden" name="do" value="<?php echo $_GET['do']; ?>
" />
						<?php if ($_GET['total_count']): ?><input type="hidden" name="total_count" value="<?php echo $_GET['total_count']; ?>
" /><?php endif; ?>
						<?php if ($_GET['pos']): ?><input type="hidden" name="pos" value="<?php echo $_GET['pos']; ?>
" /><?php endif; ?>
						
						<input type="text" placeholder="Từ khóa tìm kiếm..." name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
"/>
						<select name="indust">
							<option value="0">Tất cả ngành nghề</option>
							<?php echo $this->_tpl_vars['JobindustOptions']; ?>
							
						</select>
						
						<select name="area">
							<option value="0">Tất cả địa điểm</option>
							<?php echo $this->_tpl_vars['AreaOptions']; ?>

						</select>
						
						<input type="submit" value="Tìm kiếm" />
					</form>
				    <?php endif; ?>
				</div>
				<div id="job-study" class="tab-item">
					
				</div>
				<div id="job-learn" class="tab-item">
					33333333333333333333333333
				</div>
			</div>
		</div>
	</div>