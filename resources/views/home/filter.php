<?php
/** @var \App\Task\DataCollection $collection */
if ($collection->isEmpty()):?>
    <h1>Not found filtered items</h1>
<?php else:?>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collection->get() as $el):?>
                <tr>
                    <td><?=$el['code']?></td>
                    <td><?=$el['name']?></td>
                    <td><?=$el['price']?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>

<?php endif ?>