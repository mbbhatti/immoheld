<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container">
        <?php if($rows): ?>
            <div class="row">
                <div class="col-xs-3 col-lg-3 my-3">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-info" id="list">
                                List View
                            </button>
                            <button class="btn btn-danger" id="grid">
                                Grid View
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-lg-3 my-3">
                    <input id="price" type="text" placeholder="Filter By Price" class="form-control filter">
                </div>
                <div class="col-xs-3 col-lg-3 my-3">
                    <input id="size" type="text" placeholder="Filter By Size" class="form-control filter">
                </div>
                <div class="col-xs-3 col-lg-3 my-3">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Sort</option>
                        <option value="price_asc">Price ASC</option>
                        <option value="price_desc">Price DESC</option>
                        <option value="size_asc">Size ASC</option>
                        <option value="size_desc">Size DESC</option>
                    </select>
                </div>
            </div>
            <div id="products" class="row view-group">
                <?php foreach($rows as $row): ?>
                    <div class="item col-xs-3 col-lg-3">
                        <div class="thumbnail card" data-price="<?php echo $row->price; ?>" data-size="<?php echo $row->size; ?>">
                            <div class="img-event">
                                <img class="group list-group-image img-fluid" src="<?php echo $row->image; ?>" alt="" />
                            </div>
                            <div class="caption card-body">
                                <h6 class="group card-title inner list-group-item-heading">
                                    <?php echo $row->title; ?>
                                </h6>
                                <p class="group inner list-group-item-text">
                                    <?php echo $row->address; ?>
                                </p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 price">
                                        <b>Price:</b> <?php echo $row->price; ?>
                                    </div>
                                    <div class="col-xs-12 col-md-6 size">
                                        <b>Size:</b> <?php echo $row->size; ?>sqm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <h4 class="text-center">No Record Found</h4>
        <?php endif; ?>
        <div class="overlay">
            <div class="overlay__inner">
                <div class="overlay__content"><span class="spinner"></span></div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script type="text/javascript" src="/assets/js/real-estate.js"></script>
<?= $this->endSection() ?>
