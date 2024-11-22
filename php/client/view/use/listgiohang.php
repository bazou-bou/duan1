<h2>Giỏ hàng của bạn</h2>
<table>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->price; ?></td>
                <td>
                    <form action="?act=client-update-listgiohang&id=<?php echo $item->item_id; ?>" method="POST">
                        <input type="number" name="quantity" value="<?php echo $item->quantity; ?>" min="1">
                        <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td>
                    <a href="?act=client-remove-listgiohang&product_id=<?php echo $item->product_id; ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
