<?php

namespace Numerus\Repositories;

use Numerus\Comment;

class CommentRepository extends Repository {
	
	public function __construct(Comment $comment){
		$this->model= $comment;
	}
}