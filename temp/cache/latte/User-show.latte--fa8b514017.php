<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\OSPanel\home\nette.loc\app\UI\User/show.latte */
final class Template_fa8b514017 extends Latte\Runtime\Template
{
	public const Source = 'D:\\OSPanel\\home\\nette.loc\\app\\UI\\User/show.latte';

	public const Blocks = [
		['content' => 'blockContent', 'username' => 'blockUsername'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<div class="container container-fluid">
    <div class="row">

        <h2 class="mb-5">User page</h2>

        <div class="fs-4 fw-bold text-dark">Username:</div>
';
		$this->renderBlock('username', get_defined_vars()) /* line 9 */;
		echo '
        <div class="fs-4 fw-bold text-dark">User email:</div>
        <div class="ms-3">';
		echo LR\Filters::escapeHtmlText($item->email) /* line 12 */;
		echo '</div>

        <div class="fs-4 fw-bold text-dark">User active:</div>
        <div class="ms-3">';
		echo LR\Filters::escapeHtmlText($item->is_active ? 'Yes' : 'No') /* line 15 */;
		echo '</div>

    </div>
</div>
';
	}


	/** n:block="username" on line 9 */
	public function blockUsername(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '        <div class="ms-3">';
		echo LR\Filters::escapeHtmlText($item->username) /* line 9 */;
		echo '</div>
';
	}
}
