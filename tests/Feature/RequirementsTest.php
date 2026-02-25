<?php

test('requirements page is displayed', function () {
    $response = $this->get('/requirements');

    $response->assertStatus(200);
});
