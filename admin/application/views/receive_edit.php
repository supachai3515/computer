<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid box" ng-controller="receive">
        <div class="page-header">
          <h1>แก้ไขใบรับสินค้า</h1>
        </div>
        <div style="padding-top:30px;"></div>
        <form class="form-horizontal" method="POST"  action="<?php echo base_url('receive/update/'.$receive_data['id']);?>" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="id">รหัส</label>
          <div class="col-md-4">
          <input id="receive_id" name="receive_id" type="hidden" disabled="true" value="<?php echo $receive_data['id']; ?>" placeholder="รหัส" class="form-control input-md" required="">
          <input id="doc_no" name="doc_no" type="text" disabled="true" value="<?php echo $receive_data['doc_no']; ?>" placeholder="รหัส" class="form-control input-md" required="">

          </div>
        </div>

         <!-- Text input-->
          <div class="form-group">
              <label class="col-md-3 control-label" for="do_ref">หมายเลขอ้างอิง</label>
              <div class="col-md-6">
                  <input id="do_ref" name="do_ref" type="text" placeholder="หมายเลขอ้างอิง" class="form-control input-md" value="<?php echo $receive_data['do_ref']; ?>" >
              </div>
          </div>


          <!-- Multiple Checkboxes -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="is_vat">คำนวน vat</label>
              <div class="col-md-4">
                  <div class="checkbox">
                      <label for="is_vat">
                          <input type="checkbox" name="is_vat" ng-model="is_vat_rececive"  ng-checked="<?php echo $receive_data['is_vat']; ?>"  value="1" <?php if ($receive_data['is_vat']==1): ?>
                            <?php echo "checked"; ?>
                          <?php endif ?>
                          > คำนวน vat
                      </label>
                  </div>
              </div>
          </div>
          <!-- Button -->

          <!-- Text input-->
          <div class="form-group">
              <label class="col-md-3 control-label" for="name">เพิ่มสินค้า</label>
              <div class="col-md-6 well">
                  <input type="text" class="form-control input-md" ng-model="sku" placeholder="รหัสสินค้า" enter><br />
                  <input type="number" class="form-control input-md" ng-model="qty" placeholder="จำนวน" enter><br />
                  <input type="number" class="form-control input-md" ng-model="price" placeholder="ราคา" enter><br />
                  <button type="button"  class="btn btn-primary" ng-click="addReceive()">เพิ่ม</button>
                  <p class="text-danger">{{msgError}}</p>


                  <div class="table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>
                                      sku
                                  </th>
                                  <th>
                                      name
                                  </th>
                                  <th>
                                      qty
                                  </th>
                                  <th>
                                      price
                                  </th>
                                  <th>
                                      vat
                                  </th>
                                  <th>
                                      total
                                  </th>
                                  <th>
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="product in product_receive">
                                  <td>
                                      <input type="hidden" name="sku[]" value="{{product.sku}}" >
                                      <input type="hidden" name="id[]" value="{{product.id}}" >
                                      {{ product.sku }}
                                  </td>
                                  <td>
                                      {{ product.name }}
                                  </td>
                                  <td>
                                      <input type="hidden" name="qty[]" value="{{product.qty}}" >
                                      {{ product.qty }}
                                  </td>
                                  <td>
                                      <input type="hidden" name="price[]" value="{{product.price }}" >
                                      {{ product.price | currency:'' }}
                                  </td>
                                  <td>
                                      {{ product.vat }}
                                  </td>
                                  <td>
                                      {{ product.total  | currency:'' }}
                                  </td>

                                  <td>
                                      <button type="button" class="btn btn-danger" ng-click="removeProduct($index)">ลบ</button>
                                  </td>

                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td>
                                  </td>
                                  <td>
                                  </td>
                                  <td>
                                     <strong> {{ getQtyReceive() }}</strong>
                                  </td>
                                  <td>

                                  </td>
                                  <td>
                                      <strong>{{ getVatReceive()  | currency:'' }}</strong>
                                  </td>
                                  <td>
                                      <strong>{{ getTotalReceive() | currency:''  }}</strong>
                                  </td>

                                  <td>
                                  </td>

                              </tr>

                          </tfoot>
                      </table>
                  </div>
              </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
              <label class="col-md-3 control-label" for="comment">หมายเหตุ</label>
              <div class="col-md-6">
                  <input id="comment" name="comment" type="text" placeholder="หมายเหตุ" class="form-control input-md" value="<?php echo $receive_data['comment']; ?>" >
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-3 control-label" for="comment">Supplier</label>
              <div class="col-md-6">
                  <input id="supplier" name="supplier" type="text" placeholder="Supplier" class="form-control input-md" value="<?php echo $receive_data['supplier']; ?>" >
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-3 control-label" for="comment">Warranty</label>
              <div class="col-md-6">
                  <input id="warranty" name="warranty" type="text" placeholder="warranty" class="form-control input-md" value="<?php echo $receive_data['warranty']; ?>" >
              </div>
          </div>


        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-3 control-label" for="isactive">ใช้งาน</label>
          <div class="col-md-4">
          <div class="checkbox">
            <label for="isactive-0">
              <input type="checkbox" name="isactive" id="isactive-0" value="1"
              <?php if ($receive_data['is_active']==1): ?>
                <?php echo "checked"; ?>
              <?php endif ?>
              >
              ใช้งาน
            </label>
            </div>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-3 control-label" for="save"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">เปลี่ยนแปลงข้อมูล</button>
          </div>
        </div>
        </fieldset>
        </form>
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
<!-- /.content -->
