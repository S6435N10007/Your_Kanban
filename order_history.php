<?php
    include('includes/header.php');
    include('includes/connect.php');
?>
    <section>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3><b>Order History</b></h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Time</th>
                                <th>Shipping Name</th>
                                <th>Shipping Phone</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT o.*,os.order_status 
                                    FROM tb_order o
                                    INNER JOIN tb_order_status os
                                    ON o.o_status = os.order_status_id
                                    WHERE m_no = '".$_SESSION['m_no']."'";
                            $result = mysqli_query($conn, $sql);
                            $i=0;
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['o_id']; ?></td>
                                <td><?php echo $row['o_time']; ?></td>
                                <td><?php echo $row['o_shipping_name']; ?></td>
                                <td><?php echo $row['o_shipping_phone']; ?></td>
                                <td><?php echo number_format($row['o_total_price'],2); ?></td>
                                <td><?php echo $row['order_status']; ?></td>
                                <td>
                                <a href="order_detail.php?id=<?php echo $row['o_id']; ?>">Detail</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            }
                            if($i==0)
                            {
                                echo "<tr><td colspan='7' align='center'>No Data</td></tr>";
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php 
    include("includes/footer.php");
    
?>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>