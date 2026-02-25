<?php

test('stats page is displayed', function () {
    $response = $this->get('/stats');

    $response->assertStatus(200);
});
