<?php

test('eligibility page is displayed', function () {
    $response = $this->get('/eligibility');

    $response->assertStatus(200);
});
