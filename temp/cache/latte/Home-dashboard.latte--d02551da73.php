<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\OSPanel\home\nette.loc\app\UI\Home/dashboard.latte */
final class Template_d02551da73 extends Latte\Runtime\Template
{
	public const Source = 'D:\\OSPanel\\home\\nette.loc\\app\\UI\\Home/dashboard.latte';

	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['item' => '21'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
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
';
		$this->renderBlock('title', get_defined_vars()) /* line 5 */;
		echo '			<div>
				<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:create')) /* line 7 */;
		echo '" class="btn btn-success btn-lg my-2">Create user</a>
			</div>
			<div class="clearfix"></div>
';
		if ($users) /* line 10 */ {
			echo '			<table class="table table-striped table-hover my-3">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Username</th>
						<th scope="col">Email</th>
						<th scope="col">Active</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
';
			foreach ($users as $item) /* line 21 */ {
				echo '				<tr class="users">

					<td scope="row">';
				echo LR\Filters::escapeHtmlText($item->id) /* line 23 */;
				echo '</td>

					<td scope="row"><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:show', [$item->id])) /* line 25 */;
				echo '" class="fs-3">';
				echo LR\Filters::escapeHtmlText($item->username) /* line 25 */;
				echo '</a></td>

					<td scope="row">';
				echo LR\Filters::escapeHtmlText($item->email) /* line 27 */;
				echo '</td>

					<td scope="row">
						';
				echo LR\Filters::escapeHtmlText($item->is_active ? 'Yes' : 'No') /* line 30 */;
				echo '
					</td>

					<td scope="row">
						<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:edit', [$item->id])) /* line 34 */;
				echo '" class="btn btn-primary">Edit</a>
						<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:delete', [$item->id])) /* line 35 */;
				echo '" class="btn btn-danger">Delete</a>
					</td>
				</tr>
';

			}

			echo '			</table>
';
		} else /* line 39 */ {
			echo '				<p>There are no users yet</p>
';
		}
		echo '		</div>
	</div>
';
	}


	/** n:block="title" on line 5 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '			<h1>Users</h1>
';
	}
}
