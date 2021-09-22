<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
	protected $table                = 'blog';
	protected $primaryKey           = 'blog_id';
	protected $useTimestamps		= true;
	protected $allowedFields		= ['blog_title', 'slug', 'category_id', 'blog_content'];
}
