<?php

use Wotz\SocialMediaLinks\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, InteractsWithViews::class, RefreshDatabase::class)->in('Feature');
