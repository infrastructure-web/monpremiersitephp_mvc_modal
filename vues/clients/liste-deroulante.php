<select id="client_id" name="client_id">
    <?php
        foreach ($clients as $client) {
    ?>
        <option value="<?= $client->id ?>">
            <?= $client->nom_complet ?>
    <?php
        }
    ?>
</select>