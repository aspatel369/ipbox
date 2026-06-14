<?php include 'common/header.php'; ?>

<style>
    #categoryTabContent .dataTables_wrapper,
    #categoryTabContent table.dataTable {
        width: 100% !important;
    }
</style>

<div class="content">
    <br>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Manage Settings 
                            <button style="float: right;" type="button" class="btn btn-primary" id="addBtn">
                                Add Settings
                            </button>
                        </h5>
                    </div>
                   
                    <div class="card-body">
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <script>alert("<?= $this->session->flashdata('msg'); ?>");</script>
                        <?php } ?>

                        <?php if (empty($grouped_data)) { ?>
                            <p class="text-muted mb-0">No configuration records found. Click <strong>Add Settings</strong> to create one.</p>
                        <?php } else { ?>
                            <ul class="nav nav-tabs nav-tabs-custom mb-3" id="categoryTabs" role="tablist">
                                <?php foreach ($grouped_data as $catName => $rows) {
                                    $tabId = 'cat-tab-' . md5($catName);
                                    $isActive = ($selected_category === $catName);
                                ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?php echo $isActive ? 'active' : ''; ?>"
                                            id="<?php echo $tabId; ?>-link"
                                            data-bs-toggle="tab"
                                            href="#<?php echo $tabId; ?>"
                                            role="tab"
                                            data-category="<?php echo htmlspecialchars($catName, ENT_QUOTES, 'UTF-8'); ?>"
                                            aria-controls="<?php echo $tabId; ?>"
                                            aria-selected="<?php echo $isActive ? 'true' : 'false'; ?>">
                                            <?php echo htmlspecialchars($catName); ?>
                                            <span class="badge bg-secondary-subtle text-secondary ms-1"><?php echo count($rows); ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content" id="categoryTabContent">
                                <?php foreach ($grouped_data as $catName => $rows) {
                                    $tabId = 'cat-tab-' . md5($catName);
                                    $isActive = ($selected_category === $catName);
                                ?>
                                    <div class="tab-pane fade <?php echo $isActive ? 'show active' : ''; ?>"
                                        id="<?php echo $tabId; ?>"
                                        role="tabpanel"
                                        aria-labelledby="<?php echo $tabId; ?>-link">
                                        <table class="table table-striped table-bordered dt-responsive nowrap w-100 config-category-table" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Config Name Key</th>
                                                        <th>Value</th>
                                                        <th>Comment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($rows as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo htmlspecialchars($row['ConfigNameKey']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['Value']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['Comment']); ?></td>
                                                        <td class="text-end">
                                                            <a href="javascript:;" class="btn btn-sm bg-primary-subtle me-1 editBtn"
                                                                data-id="<?php echo $row['id']; ?>">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                            </a>
                                                            <a href="<?php echo base_url('/'); ?>index.php/Configuration/deleteRecord/<?php echo $row['id']; ?>?category=<?php echo urlencode($catName); ?>"
                                                                onclick="return confirm('Are you sure you want to delete this configuration?')"
                                                                class="btn btn-sm bg-danger-subtle">
                                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (empty($rows)) { ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted">No records in this category.</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Settings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="configForm" method="post" action="<?php echo base_url('/'); ?>index.php/Configuration/saveDetails" class="row g-3">
                    <input type="hidden" name="id" id="configId" value="0" />

                    <div class="col-md-6">
                        <label for="Category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="Category" id="Category" list="categoryList" required>
                        <datalist id="categoryList">
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo htmlspecialchars($cat['Category']); ?>">
                            <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-6">
                        <label for="ConfigNameKey" class="form-label">Config Name Key</label>
                        <input type="text" class="form-control" name="ConfigNameKey" id="ConfigNameKey" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Value" class="form-label">Value</label>
                        <input type="text" class="form-control" name="Value" id="Value" required>
                    </div>

                    <div class="col-md-6">
                        <label for="ValueTwo" class="form-label">Value Two (optional)</label>
                        <input type="text" class="form-control" name="ValueTwo" id="ValueTwo">
                    </div>

                    <div class="col-md-12">
                        <label for="Comment" class="form-label">Comment</label>
                        <textarea class="form-control" name="Comment" id="Comment" rows="2"></textarea>
                    </div>

                    <div class="col-12">
                        <button style="float: right;" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	
<script>
    var selectedCategory = <?php echo json_encode($selected_category); ?>;

    function getActiveCategory() {
        var activeTab = document.querySelector('#categoryTabs .nav-link.active');
        return activeTab ? activeTab.getAttribute('data-category') : selectedCategory;
    }

    $('#categoryTabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        selectedCategory = $(e.target).data('category');
        var url = new URL(window.location.href);
        url.searchParams.set('category', selectedCategory);
        window.history.replaceState({}, '', url);

        var $table = $($(e.target).attr('href')).find('.config-category-table');
        if ($table.length && $.fn.DataTable.isDataTable($table[0])) {
            var api = $table.DataTable();
            api.columns.adjust();
            if (api.responsive) {
                api.responsive.recalc();
            }
        }
    });

    $('#addBtn').on('click', function() {
        $('#configForm')[0].reset();
        $('#configId').val(0);
        var cat = getActiveCategory();
        if (cat) {
            $('#Category').val(cat);
        }
        $('#staticBackdropLabel').text('Add Settings');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/Configuration/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {
                $('#configId').val(id);
                $('#Category').val(res.Category);
                $('#ConfigNameKey').val(res.ConfigNameKey);
                $('#Value').val(res.Value);
                $('#ValueTwo').val(res.ValueTwo);
                $('#Comment').val(res.Comment);

                $('#staticBackdropLabel').text('Update Settings');
                $('button[type="submit"]').text('Update');
                $('#staticBackdrop').modal('show');
            },
            error: function() {
                alert('Error fetching configuration data');
            }
        });
    });

    function initConfigDataTables() {
        $('.config-category-table').each(function() {
            if ($.fn.DataTable.isDataTable(this)) {
                return;
            }
            $(this).DataTable({
                lengthChange: false,
                autoWidth: false,
                responsive: true,
                scrollX: false,
                buttons: ['copy', 'print'],
                dom: '<"row mb-3"<"col-md-6"B><"col-md-6"f>>rt<"row mt-2"<"col-md-6"i><"col-md-6"p>>'
            });
        });
        $('.dataTables_filter input').addClass('form-control form-control-sm');
        $('.dataTables_filter label').addClass('form-label');
    }

    $(window).on('load', function() {
        initConfigDataTables();
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    });
</script>

<?php include 'common/footer.php'; ?>
