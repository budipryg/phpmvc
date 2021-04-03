<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary addDataButton" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Add Student Data
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/student/search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter your keyword ..." aria-label="keyword"
                        aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Students List</h3>
            <ul class="list-group">
                <?php foreach ($data['students'] as $std) : ?>
                <li class="list-group-item"><?= $std['name'] ?>
                    <a href="<?= BASEURL; ?>/student/delete/<?= $std['id'] ?>" class="badge bg-danger float-end ms-1"
                        onclick="return confirm('yakin?');">delete</a>
                    <a href="<?= BASEURL; ?>/student/edit/<?= $std['id'] ?>"
                        class="badge bg-success float-end ms-1 showEditModal" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-id="<?= $std['id'] ?>">edit</a>
                    <a href="<?= BASEURL; ?>/student/detail/<?= $std['id'] ?>"
                        class="badge bg-primary float-end ms-1">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Add Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/student/create" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <input type="text" class="form-control" id="major" name="major">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Data</button>
                </form>
            </div>
        </div>
    </div>
</div>