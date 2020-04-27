<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Caesar Cipher <i>(Random)</i></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                </div>
                <div class="card-body mb-4">
                    <form action="<?php global $action; echo route_method($action) ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 offset-1">
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="" class="form-control-label">Plain Text</label>
                                        <input type="text" style="text-transform: uppercase;" name="plaintext" class="form-control" required placeholder="Masukkan plaintext disini..." onkeypress="return /[a-z]/i.test(event.key)">
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <label for="" class="form-control-label">Type</label>
                                        <select name="type" id="" class="form-control">
                                            <option value="encrypt">ENCRYPT</option>
                                            <option value="decrypt">DECRYPT</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button class="btn btn-secondary btn-block" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="alert alert-success">
                                    <u><b>Encrypt Pattern : </b></u> &nbsp;
                                    <b><i>
                                        <span style="font-size: 22px;">C<sub>i</sub> = ( P<sub>i</sub> + 3 ) % 26</span>
                                    </i></b>
                                    <br><br>
                                    <u><b>Decrypt Pattern : </b></u> &nbsp;
                                    <b><i>
                                        <span style="font-size: 22px;">C<sub>i</sub> = ( P<sub>i</sub> - 3 ) % 26</span>
                                    </i></b>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                if (isset($_POST['submit'])):
                    $plaintext = strtoupper(getPost('plaintext'));
                    $lengthText = strlen($plaintext);
                    $rangeChar = range('A', 'Z');

                    $resultIndex = [];
                    $resultMod = [];
                    $resultText = "";
                ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
                    </div>
                    <div class="card-body mb-4">
                        <form action="<?php global $action; echo route_method($action) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="row mt-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">PLAINTEXT</td>
                                                <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                    <td class="text-center font-weight-bold"><?= $plaintext[$i] ?></td>
                                                <?php endfor ?>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">INDEX</td>
                                                <?php
                                                    for ($i = 0; $i < $lengthText; $i++):
                                                        $currentChar = $plaintext[$i];
                                                        for ($j = 0; $j < count($rangeChar); $j++):
                                                            if ($currentChar == $rangeChar[$j]):
                                                                $resultIndex[] = $j;
                                                                $resultMod[] = (getPost('type') == "encrypt") ? (($j + 3) % 26) : (($j - 3) % 26);
                                                ?>
                                                    <td class="text-center font-weight-bold"><?= $j ?></td>
                                                
                                                <?php
                                                            endif;
                                                        endfor;
                                                    endfor;
                                                ?>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">KUNCI</td>
                                                <td class="text-center font-weight-bold" colspan="<?= $lengthText ?>"> +3</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">HASIL</td>
                                                <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                    <td class="text-center font-weight-bold"><?= ($resultIndex[$i] + 3) ?></td>
                                                <?php endfor; ?>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">MOD 26</td>
                                                <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                    <td class="text-center font-weight-bold"><?= ($resultMod[$i]) ?></td>
                                                <?php endfor; ?>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">Char Cipher</td>
                                                <?php
                                                    for ($i = 0; $i < $lengthText; $i++):
                                                ?>
                                                    <td class="text-center font-weight-bold">
                                                        <?php
                                                            $resultIndex = $resultMod[$i];
                                                            echo $rangeChar[$resultIndex];
                                                            $resultText .= $rangeChar[$resultIndex];
                                                        ?>
                                                    </td>
                                                
                                                <?php
                                                    endfor;
                                                ?>
                                            </tr>
                                            <tr>
                                                <td class="text-center font-weight-bold bg-primary text-white">KUNCI</td>
                                                <td class="text-center font-weight-bold" colspan="<?= $lengthText ?>">
                                                    <?= $resultText; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
