import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType( 'forma/block-static', {
    title: 'Forma Block Static',
    icon: 'smiley',
    category: 'design',
    edit: () => {
		const blockProps = useBlockProps();

		return <p { ...blockProps }>Olá, painel!</p>;
	},
    save: () => <p>Olá, site!</p>,
} );