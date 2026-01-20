<?php

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Wotz\SocialMediaLinks\Tests\TestCase;

uses(TestCase::class, InteractsWithViews::class, RefreshDatabase::class)->in('Feature');
