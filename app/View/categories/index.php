<?php include __DIR__ . '/../navbar.php'; ?>

<div class="card">
    <?php if (isset($data['error'])) { ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <?= $data['error'] ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="alert alert-success" role="alert">
            <?= $data['success'] ?>
        </div>
    </div>

    <div class="card-body">
        <div class="container">
            <form action="/categories" method="post">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="nameHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>