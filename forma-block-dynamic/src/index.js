import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';

registerBlockType( 'forma/block-dynamic', {
	apiVersion: 2,
    title: 'Forma Block Dynamic',
    icon: 'superhero',
	category: 'design',
	attributes: {
        richTextContent: {
            type: 'array',
            source: 'children',
            selector: 'p',
        },
	},
    edit: ( {attributes, setAttributes} ) => {
		const blockProps = useBlockProps();

		function onChangeContent( newContent ) {
            setAttributes( { richTextContent: newContent } );
        };

		return (
			<RichText
				{ ...blockProps }
				onChange={ onChangeContent }
				tagName="p"
				value={ attributes.richTextContent }
			/>
		);
	},
	save: ( { attributes } ) => {
		const {
			richTextContent,
		} = attributes;

		const blockProps = useBlockProps.save();
		
		return (
			<RichText.Content
				{ ...blockProps }
				tagName="p"
				value={ richTextContent }
			/>
		);
	}
} );