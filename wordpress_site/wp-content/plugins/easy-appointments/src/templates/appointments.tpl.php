<script type="text/template" id="ea-appointments-main">
<?php 
	get_current_screen()->render_screen_meta();
?>
	<div class="wrap">
		<h2><?php esc_html_e('Appointments', 'easy-appointments');?></h2>
		<br>
		<table id="ea-appointments-table-filter" class="filter-part wp-filter ea-responsive-table">
			<tbody>
				<tr>
					<td class="filter-label"><label for="ea-filter-locations"><strong><?php esc_html_e('Location', 'easy-appointments');?> :</strong></label></td>
					<td class="filter-select">
						<select name="ea-filter-locations" id="ea-filter-locations" data-c="location">
							<option value="">-</option>
							<% _.each(cache.Locations,function(item,key,list){ %>
								<option value="<%- item.id %>"><%- item.name %></option>
							<% });%>
						</select>
					</td>
					<td class="filter-label"><label for="ea-filter-services"><strong><?php esc_html_e('Service', 'easy-appointments');?> :</strong></label></td>
					<td class="filter-select">
						<select name="ea-filter-services" id="ea-filter-services" data-c="service">
							<option value="">-</option>
							<% _.each(cache.Services,function(item,key,list){ %>
								<option value="<%- item.id %>"><%- item.name %></option>
							<% });%>
						</select>
					</td>
					<td class="filter-label"><label for="ea-filter-workers"><strong><?php esc_html_e('Worker', 'easy-appointments');?> :</strong></label></td>
					<td class="filter-select">
						<select name="ea-filter-workers" id="ea-filter-workers" data-c="worker">
							<option value="">-</option>
							<% _.each(cache.Workers,function(item,key,list){ %>
							<option value="<%- item.id %>"><%- item.name %></option>
							<% });%>
						</select>
					</td>
					<td class="filter-label">
                        <label for="ea-filter-search"><strong><?php esc_html_e('Search', 'easy-appointments');?> :</strong></label>
                        <input type="text" name="ea-filter-search" id="ea-filter-search" data-c="search">
                        <button>&#128269;</button>
                    </td>
                    <td>
                    </td>
				</tr>
				<tr>
					<td class="filter-label"><label for="ea-filter-status"><strong><?php esc_html_e('Status', 'easy-appointments');?> :</strong></label></td>
					<td class="filter-select">
						<select name="ea-filter-status" id="ea-filter-status" data-c="status">
							<option value="">-</option>
							<% _.each(cache.Status,function(item,key,list){ %>
								<option value="<%- key %>"><%- item %></option>
							<% });%>
						</select>
					</td>
					<td class="filter-label"><label for="ea-filter-from"><strong><?php esc_html_e('From', 'easy-appointments');?> :</strong></label></td>
					<td><input class="date-input" type="text" name="ea-filter-from" id="ea-filter-from" data-c="from"></td>
					<td class="filter-label"><label for="ea-filter-to"><strong><?php esc_html_e('To', 'easy-appointments');?> :</strong></label></td>
					<td><input class="date-input" type="text" name="ea-filter-to" id="ea-filter-to" data-c="to"></td>
					<td class="filter-label"><strong><?php esc_html_e('Quick time filter', 'easy-appointments');?>:</strong>
						<select id="ea-period">
                            <option value=""><?php esc_html_e('Select period', 'easy-appointments');?></option>
                            <option value="today"><?php esc_html_e('Today', 'easy-appointments');?></option>
                            <option value="tomorrow"><?php esc_html_e('Tomorrow', 'easy-appointments');?></option>
                            <option value="7d"><?php esc_html_e('Next 7 days', 'easy-appointments');?></option>
                            <option value="30d"><?php esc_html_e('Next 30 days', 'easy-appointments');?></option>
                            <option value="week"><?php esc_html_e('This week', 'easy-appointments');?></option>
                            <option value="month"><?php esc_html_e('This month', 'easy-appointments');?></option>
						</select>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div>
			<a href="#" class="add-new-h2 add-new">
				<i class="fa fa-plus"></i>
				<?php esc_html_e('Add New Appointment', 'easy-appointments');?>
			</a>
			<a href="#" class="add-new-h2 refresh-list">
				<i class="fa fa-refresh"></i>
				<?php esc_html_e('Refresh', 'easy-appointments');?>
			</a>
			<a href="#" data="all" class="add-new-h2 ea-cancel-all-selected" style="float:right;">
				<i class="fa fa-times"></i>
				<?php esc_html_e('Cancel All', 'easy-appointments');?>
			</a>
			<a href="#" data="selected" class="add-new-h2 ea-cancel-all-selected" style="float:right;">
				<i class="fa fa-times"></i>
				<?php esc_html_e('Cancel All Selected', 'easy-appointments');?>
			</a>
			<a href="#" data="selected" class="add-new-h2 ea-delete-selected" style="float:right;border: 1px solid #d63638; color:#d63638; display:none;">
				<i class="fa fa-times"></i>
				<?php esc_html_e('Delete Selected', 'easy-appointments');?>
			</a>
            <div class="ea-sort-fields">
                <label><?php esc_html_e('Sort By', 'easy-appointments');?>:</label>
                <select id="ea-sort-by" name="ea-sort-by">
                    <option value="id"><?php esc_html_e('Id', 'easy-appointments');?></option>
                    <option value="date"><?php esc_html_e('Date & time', 'easy-appointments');?></option>
                    <option value="created"><?php esc_html_e('Created', 'easy-appointments');?></option>
                </select>
                <label><?php esc_html_e('Order by', 'easy-appointments');?>:</label>
                <select id="ea-order-by" name="ea-order-by">
                    <option value="ASC">asc</option>
                    <option value="DESC" selected>desc</option>
                </select>
            </div>
			<span id="status-msg" class="status"></span>
		</div>

		<table class="ea-responsive-table widefat fixed">
			<thead>
				<tr>
					<th class="manage-column column-title">
						<input type="checkbox" id="ea-select-all" style="margin:4px 0px 0 0;" />
						<label for="ea-select-all"><?php esc_html_e('Select All', 'easy-appointments'); ?></label>
					</th>
                    <th colspan="2" class="manage-column column-title"><a class="ea-set-sort" data-key="id" href="#">Id</a> / <?php esc_html_e('Location', 'easy-appointments');?> / <?php esc_html_e('Service', 'easy-appointments');?> / <?php esc_html_e('Worker', 'easy-appointments');?></th>
					<th colspan="2" class="manage-column column-title"><?php esc_html_e('Customer', 'easy-appointments');?></th>
					<th class="manage-column column-title"><?php esc_html_e('Description', 'easy-appointments');?></th>
					<th class="manage-column column-title"><a class="ea-set-sort" data-key="date" href="#"><?php esc_html_e('Date & time', 'easy-appointments');?></a></th>
                    <th class="manage-column column-title"><?php esc_html_e('Status', 'easy-appointments');?> / <?php esc_html_e('Price', 'easy-appointments');?> / <a href="#" class="ea-set-sort" data-key="created"><?php esc_html_e('Created', 'easy-appointments');?></a></th>
					<th class="manage-column column-title"><?php esc_html_e('Action', 'easy-appointments');?></th>
				</tr>
			</thead>
			<tbody id="ea-appointments">
			</tbody>
		</table>
	</div>
</script>

<script type="text/template" id="ea-tpl-appointment-row">
	<td>
		<input type="checkbox" class="ea-appointment-checkbox" data-id="<%- row.id %>" />
	</td>
	<td colspan="2" class="post-title page-title column-title">
		<strong>#<%- row.id %></strong>
		<strong><%- _.findWhere(cache.Locations, {id:row.location})?.name %></strong>
		<strong><%- _.findWhere(cache.Services, {id:row.service})?.name %></strong>
		<strong><%- _.findWhere(cache.Workers, {id:row.worker})?.name %></strong>
	</td>
	<td colspan="2">
		<% _.each(cache.MetaFields, function(item,key,list) { %>
			<% if (row[item.slug] !== "undefined" && item.type !== 'TEXTAREA') { %>
			<strong><%- row[item.slug] %></strong><br>
			<% } %>
		<% });%>
	</td>
	<td>
		<% _.each(cache.MetaFields,function(item,key,list) { %>
			<% if (row[item.slug] !== "undefined" && item.type === 'TEXTAREA') { %>
			<strong><%- row[item.slug] %></strong><br>
			<% } %>
		<% });%>
	</td>
	<td>
		<strong><%- _.formatDate(row.date) %> - <%- _.formatTime(row.start) %></strong><br>
		<strong><%- _.formatDate(row.end_date) %> - <%- _.formatTime(row.end) %></strong>
	</td>
	<td>
		<strong><%- eaData.Status[row.status] %></strong><br>
		<!-- <strong><%- row.user %></strong><br> -->
		<strong><%- row.price %></strong><br>
		<strong><%- _.formatDateTime(row.created) %></strong>
	</td>
	<td class="action-center">
		<button class="button btn-edit"><?php esc_html_e('Edit', 'easy-appointments');?></button>
		<button class="button btn-del"><?php esc_html_e('Delete', 'easy-appointments');?></button>
		<button class="button btn-clone"><?php esc_html_e('Clone', 'easy-appointments');?></button>
	</td>
</script>

<script type="text/template" id="ea-tpl-appointment-row-edit">
<td colspan="8">
	<table class="inner-edit-table ea-responsive-table">
		<tbody>
			<tr>
				<td colspan="2">
					<select class="app-fields" name="ea-input-locations" id="ea-input-locations" data-prop="location">
						<option value=""> -- <?php esc_html_e('Location', 'easy-appointments');?> -- </option>
						<% _.each(cache.Locations,function(item,key,list){
						if (item.id == row.location) { %>
							<option value="<%- item.id %>" selected="selected"><%- item.name %></option>
						<% } else { %>
							<option value="<%- item.id %>"><%- item.name %></option>
						<% }
						});%>
					</select><br>
					<select class="app-fields ea-service" name="ea-input-services" id="ea-input-services" data-prop="service">
						<option value=""> -- <?php esc_html_e('Service', 'easy-appointments');?> -- </option>
						<% _.each(cache.Services,function(item,key,list){
							if (item.id == row.service) { %>
								<option value="<%- item.id %>" data-duration="<%- item.duration %>" data-price="<%- item.price %>" selected="selected"><%- item.name %></option>
						<% } else { %>
								<option value="<%- item.id %>" data-duration="<%- item.duration %>"  data-price="<%- item.price %>"><%- item.name %></option>
						<% }
						});%>
					</select><br>
					<select class="app-fields" name="ea-input-workers" id="ea-input-workers" data-prop="worker">
						<option value=""> -- <?php esc_html_e('Worker', 'easy-appointments');?> -- </option>
						<% _.each(cache.Workers,function(item,key,list){
							if(item.id == row.worker) { %>
								<option value="<%- item.id %>" selected="selected"><%- item.name %></option>
						<% } else { %>
								<option value="<%- item.id %>"><%- item.name %></option>
						<% }
						});%>
					</select>
				</td>
				<td colspan="2">
					<% _.each(cache.MetaFields,function(item,key,list) { %>
						<% if(item.type === 'INPUT' || item.type === 'MASKED') { %>
						<input type="text" data-prop="<%- item.slug %>" placeholder="<%- item.label %>" value="<% if (typeof row[item.slug] !== "undefined") { %><%- row[item.slug] %><% } %>"><br>
                        <% } else if(item.type === 'PHONE') { %>
                        <input type="text" data-prop="<%- item.slug %>" placeholder="<%- item.label %>" value="<% if (typeof row[item.slug] !== "undefined") { %><%- row[item.slug] %><% } %>"><br>
                        <% } else if(item.type === 'EMAIL') { %>
                        <input type="text" data-prop="<%- item.slug %>" placeholder="<%- item.label %>" value="<% if (typeof row[item.slug] !== "undefined") { %><%- row[item.slug] %><% } %>"><br>
                        <% } else if(item.type === 'SELECT') { %>
							<select data-prop="<%- item.slug %>">
								<% _.each(item.mixed.split(','),function(i,k,l) {
									if(typeof row[item.slug] !== 'undefined' && i === row[item.slug]) { %>
								%>
								<option value="<%- i %>" selected><%- i %></option>
								<% } else { %>
								<option value="<%- i %>" ><%- i %></option>
								<% }});%>
							</select>
						<% } %>
					<% });%>
				</td>
				<td colspan="2">
					<% _.each(cache.MetaFields,function(item,key,list) { %>
						<% if(item.type === 'TEXTAREA') { %>
						<textarea rows="3" data-prop="<%- item.slug %>" placeholder="<%- item.label %>"><% if (typeof row[item.slug] !== "undefined") { %><%- row[item.slug] %><% } %></textarea><br>
						<% } %>
					<% });%>
				</td>
				<td>
					<p><?php esc_html_e('Date', 'easy-appointments');?> :</p>
					<input id="date-start" class="app-fields date-start" type="text" data-prop="date" value="<%- row.date %>"><br>
					<p><?php esc_html_e('Time', 'easy-appointments');?> :</p>
					<select data-prop="start" disabled="disabled" class="time-start">
					</select>
				</td>
				<td>
					<select name="ea-select-status" data-prop="status">
						<% _.each(cache.Status,function(item,key,list){
							if(key == row.status) { %>
								<option value="<%- key %>" selected="selected"><%- item %></option>
						<% } else { %>
								<option value="<%- key %>"><%- item %></option>
						<% }
						});%>
					</select>
					<span><?php esc_html_e('Price', 'easy-appointments');?> : </span><input class="ea-price" style="width: 50px" type="text" data-prop="price" value="<%- row.price %>">
					<!-- <strong><%- row.user %></strong><br>
					<strong><%- row.created %></strong>-->
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<label for="send-mail"> <?php esc_html_e('Send email notification :', 'easy-appointments');?> </label>
					<input name="send-mail" type="checkbox" checked="checked">
				</td>
				<td colspan="2" style="text-align: right;">
					<button class="button button-primary btn-save"><?php esc_html_e('Save', 'easy-appointments');?></button>
					<button class="button btn-cancel"><?php esc_html_e('Cancel', 'easy-appointments');?></button>
				</td>
			</tr>
		</tbody>
	</table>
</td>
</script>

<script type="text/template" id="ea-tpl-appointment-times">
<% _.each(times,function(item,key,list){ 
	if(app.start === item.value) { %>
	<option value="<%- item.value %>" selected="selected"><%- item.show %></option>
	<% } else { %>
		<option value="<%- item.value %>" <% if(item.count < 1) {%>disabled<% } %>><%- item.show %> - <%- item.ends %></option>
	<% } %>
<% });%>
</script>
<script>
	var appointments_nonce = "<?php echo wp_create_nonce('appointments_nonce'); ?>";

jQuery(document).ready(function($) {
	function check_is_any_cancel_checkbox(){
		if ($('.ea-appointment-checkbox').length < 1){
			$('.ea-cancel-all-selected').hide();
		}else{
			$('.ea-cancel-all-selected').show();
		}
	}

	function checked_checkbox_count(){
		var checkedCount = $('.ea-appointment-checkbox:checked').length;
		if (checkedCount > 0){
			$('.ea-delete-selected').show();
		}else{
			$('.ea-delete-selected').hide();

		}
	}
    
    $('#ea-select-all').on('change', function() {
        var isChecked = $(this).prop('checked');
        $('.ea-appointment-checkbox').prop('checked', isChecked);
		check_is_any_cancel_checkbox();
		checked_checkbox_count();
    });

    
    $('.ea-cancel-all-selected').on('click', function(e) {
        e.preventDefault();

        var cancel_to =  $(this).attr('data');
        var selectedAppointments = [];
        $('.ea-appointment-checkbox:checked').each(function() {
            selectedAppointments.push($(this).data('id'));
        });

        if (selectedAppointments.length === 0 && cancel_to != 'all') {
            alert('<?php esc_html_e("Please select at least one appointment to cancel.", "easy-appointments"); ?>');
            return;
        }
		var popup_message = 'Are you sure you want to cancel all appointments?';
		if (cancel_to != 'all') {
			var popup_message = 'Are you sure you want to cancel all selected appointments?';
		}
        if (confirm(popup_message)) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'cancel_selected_appointments',
                    appointments: selectedAppointments,
                    cancel_to: cancel_to,
					appointments_nonce: appointments_nonce
                },
                success: function(response) {
                    if (response.data) {
                        alert('<?php esc_html_e("Appointments canceled successfully.", "easy-appointments"); ?>');
                        location.reload(); // Reload the page to reflect changes
                    }
                },
                error: function() {
                    alert('<?php esc_html_e("An error occurred.", "easy-appointments"); ?>');
                }
            });
        }
    });
    $('.ea-delete-selected').on('click', function(e) {
        e.preventDefault();
        var selectedAppointments = [];
        $('.ea-appointment-checkbox:checked').each(function() {
            selectedAppointments.push($(this).data('id'));
        });

        if (selectedAppointments.length === 0 && cancel_to != 'all') {
            alert('<?php esc_html_e("Please select at least one appointment to delete.", "easy-appointments"); ?>');
            return;
        }
		var popup_message = '<?php esc_html_e("Are you sure you want to delete selected appointments?", "easy-appointments"); ?>';
		
        if (confirm(popup_message)) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'delete_selected_appointment',
                    appointments: selectedAppointments,
					appointments_nonce: appointments_nonce
                },
                success: function(response) {
                    if (response) {
                        location.reload();
                    }
                },
                error: function() {
                    alert('<?php esc_html_e("An error occurred.", "easy-appointments"); ?>');
                }
            });
        }
    });

	check_is_any_cancel_checkbox();
	checked_checkbox_count();
	setInterval(() => {
		check_is_any_cancel_checkbox();
		checked_checkbox_count();
	}, 2000);
});

</script>