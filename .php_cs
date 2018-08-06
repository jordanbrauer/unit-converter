<?php

$root = realpath(__DIR__);
$finder = PhpCsFixer\Finder::create()
    ->exclude([
      '.git',
      '.github',
      '.vscode',
      'bin',
      'docs',
      'vendor',
      'node_modules',
      'bower_components',
    ])
    ->in([
      "{$root}/src",
      "{$root}/tests"
    ]);

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setIndent('    ') # 4 spaces
    ->setLineEnding("\n")
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setRules([
      /*
      |----------------------------------------------------------------------
      | Align Multiline Comment
      |----------------------------------------------------------------------
      |
      | Each line of multi-line DocComments must have an asterisk [PSR-5] and
      | must be aligned with the first one.
      |
      */
      'align_multiline_comment' => [
        'comment_type' => 'phpdocs_only',
      ],

      /*
      |----------------------------------------------------------------------
      | Array Syntax
      |----------------------------------------------------------------------
      |
      | Whether or not each element of an array must be indented exactly
      | once, and/or use the long or short syntax when declaring PHP arrays.
      | In array declaration, there MUST NOT be whitespace before each comma.
      | Array index should always be written by using square braces.
      | PHP multi-line arrays should have a trailing comma.
      |
      */
      'array_indentation' => true,
      'array_syntax' => [
        'syntax' => 'short',
      ],
      'no_whitespace_before_comma_in_array' => true,
      'normalize_index_brace' => true,
      'trailing_comma_in_multiline_array' => true,
      'trim_array_spaces' => true,
      'whitespace_after_comma_in_array' => true,

      /*
      |----------------------------------------------------------------------
      | Backtick Operator
      |----------------------------------------------------------------------
      |
      | Converts backtick (`ls -al`) operators to `shell_exec` calls.
      |
      */
      'backtick_to_shell_exec' => true,

      /*
      |----------------------------------------------------------------------
      | Blank Lines
      |----------------------------------------------------------------------
      |
      | There MUST be one blank line after the namespace declaration, no code
      | on the same line as the PHP open tag & followed by a blank line, as
      | well as an empty line feed preceding any configured statements.
      |
      */
      'single_blank_line_before_namespace' => true,
      'blank_line_after_namespace' => true,
      'blank_line_after_opening_tag' => true,
      'blank_line_before_statement' => [
        'statements' => [
          'break',
          'continue',
          'declare',
          'die',
          'exit',
          'return',
          'throw',
          'yield',
        ],
      ],

      /*
      |----------------------------------------------------------------------
      | Binary Operator Spaces
      |----------------------------------------------------------------------
      |
      | Binary operators should be surrounded by space as configured.
      |
      */
      'binary_operator_spaces' => [
        'default' => 'single_space',
        'operators' => [
          '=>' => 'align'
        ]
      ],

      /*
      |----------------------------------------------------------------------
      | Braces
      |----------------------------------------------------------------------
      |
      | The body of each structure MUST be enclosed by braces. Braces should
      | be properly placed. Body of braces should be properly indented.
      | Removes unneeded parentheses around control statements. Removes
      | unneeded curly braces that are superfluous and aren't part of a
      | control structure's body.
      |
      */
      'braces' => [
        'allow_single_line_closure' => false,
        'position_after_anonymous_constructs' => 'same',
        'position_after_control_structures' => 'same',
        'position_after_functions_and_oop_constructs' => 'next',
      ],
      'no_unneeded_control_parentheses' => [
        'statements' => [
          'break',
          'clone',
          'continue',
          'echo_print',
          'return',
          'switch_case',
          'yield',
        ],
      ],
      'no_unneeded_curly_braces' => false,

      /*
      |----------------------------------------------------------------------
      | Casting Space
      |----------------------------------------------------------------------
      |
      | A single space or none should be between cast and variable.
      |
      */
      'cast_spaces' => [
        'space' => 'single',
      ],

      /*
      |----------------------------------------------------------------------
      | Operator & Expression Spaces
      |----------------------------------------------------------------------
      |
      | Class, trait and interface elements must be separated with
      | one blank line.
      |
      |
      */
      'class_attributes_separation' => [
        'elements' => [
          'const',
          'property',
          'method',
        ],
      ],

      /*
      |----------------------------------------------------------------------
      | Class Keyword
      |----------------------------------------------------------------------
      |
      | Converts ::class keywords to FQCN strings.
      |
      */
      'class_keyword_remove' => false,

      /*
      |----------------------------------------------------------------------
      | Consecutive *set Calls
      |----------------------------------------------------------------------
      |
      | Using isset($var) && multiple times should be done in one call.
      | Calling unset on multiple items should be done in one call.
      |
      */
      'combine_consecutive_issets' => true,
      'combine_consecutive_unsets' => true,

      /*
      |----------------------------------------------------------------------
      | Compact Nullable Typehints
      |----------------------------------------------------------------------
      |
      | Remove extra spaces in a nullable typehint.
      |
      */
      'compact_nullable_typehint' => false,

      /*
      |----------------------------------------------------------------------
      | Concatenation Spaces
      |----------------------------------------------------------------------
      |
      | Concatenation should be spaced according configuration.
      |
      */
      'concat_space' => [
        'spacing' => 'none',
      ],

      /*
      |----------------------------------------------------------------------
      | Declare Statement Equal Sign
      |----------------------------------------------------------------------
      |
      | Equal sign in declare statement should be surrounded by spaces or not
      | following configuration.
      |
      */
      'declare_equal_normalize' => [
        'space' => 'single',
      ],

      /*
      |----------------------------------------------------------------------
      | Declare Strict Types (Risky)
      |----------------------------------------------------------------------
      |
      | Force strict types declaration in all files.
      | Requires PHP >= 7.0.
      | WARNING: Forcing strict types will stop non strict code from working.
      |
      */
      'declare_strict_types' => true,

      /*
      |----------------------------------------------------------------------
      | Else & Elseif Keyword(s)
      |----------------------------------------------------------------------
      |
      | The keyword elseif should be used instead of else if so that all
      | control keywords look like single words.
      |
      | Replace superfluous `elseif` with `if`.
      |
      | There should not be useless else cases.
      |
      */
      'elseif' => true,
      'no_superfluous_elseif' => true,
      'no_useless_else' => true,

      /*
      |----------------------------------------------------------------------
      | Escape Implicit Backslashes
      |----------------------------------------------------------------------
      |
      | Escape implicit backslashes in strings and heredocs to ease the
      | understanding of which are special chars interpreted by PHP and
      | which not.
      |
      */
      'escape_implicit_backslashes' => [
        'double_quoted' => true,
        'heredoc_syntax' => true,
        'single_quoted' => false,
      ],

      /*
      |----------------------------------------------------------------------
      | Escape Implicit Backslashes
      |----------------------------------------------------------------------
      |
      | Add curly braces to indirect variables, making them clearer to read.
      | NOTE: Requires PHP >= 7.0.
      |
      */
      'explicit_indirect_variable' => true,

      /*
      |----------------------------------------------------------------------
      | Final Internal Class
      |----------------------------------------------------------------------
      |
      | Internal classes should be final. A final class must not have final
      | methods.
      |
      */
      'no_unneeded_final_method' => true,
      'final_internal_class' => [
        'annotation-black-list' => [
          '@final',
        ],
        'annotation-white-list' => [
          '@internal',
        ],
      ],


      /*
      |----------------------------------------------------------------------
      | PHP Tags
      |----------------------------------------------------------------------
      |
      | PHP code must use the long <?php tags or short-echo <?= tags and
      | not other tag variations.
      |
      */
      'full_opening_tag' => true,

      /*
      |----------------------------------------------------------------------
      | Typehint FQCNs
      |----------------------------------------------------------------------
      |
      | Transforms imported FQCN parameters and return types in function
      | arguments to short version.
      |
      */
      'fully_qualified_strict_types' => true,

      /*
      |----------------------------------------------------------------------
      | Function Declaration & Invokation
      |----------------------------------------------------------------------
      |
      | Spaces should be properly placed in a function declaration.
      | When making a method or function call, there MUST NOT be a space
      | between the method or function name and the opening parenthesis.
      |
      */
      'function_declaration' => [
        'closure_function_spacing' => 'one',
      ],
      'function_typehint_space' => true,
      'no_spaces_after_function_name' => true,

      /*
      |----------------------------------------------------------------------
      | File Header
      |----------------------------------------------------------------------
      |
      | Add, replace or remove header comment.
      |
      */
      // 'header_comment' => [],

      /*
      |----------------------------------------------------------------------
      | HereDoc to NowDoc
      |----------------------------------------------------------------------
      |
      | Convert heredoc to nowdoc where possible.
      |
      */
      'heredoc_to_nowdoc' => false,

      /*
      |----------------------------------------------------------------------
      | Include/Require
      |----------------------------------------------------------------------
      |
      | Include/Require and file path should be divided with a single space.
      | File path should not be placed under brackets.
      |
      */
      'include' => true,

      /*
      |----------------------------------------------------------------------
      | Pre & Post Increment/Decrement Operators
      |----------------------------------------------------------------------
      |
      | Pre/post-increment and decrement operators should be used if possible.
      |
      */
      // 'increment_style' => [
      // 	'style' => 'post',
      // ],

      /*
      |----------------------------------------------------------------------
      | Enforce Indenation
      |----------------------------------------------------------------------
      |
      | Code MUST use configured indentation type.
      |
      */
      'indentation_type' => true,

      /*
      |----------------------------------------------------------------------
      | Enforce Line Ending
      |----------------------------------------------------------------------
      |
      | All PHP files must use same line ending.
      |
      */
      'line_ending' => true,

      /*
      |----------------------------------------------------------------------
      | Opening Tag Linebreak
      |----------------------------------------------------------------------
      |
      | Ensure there is no code on the same line as the PHP open tag.
      |
      */
      'linebreak_after_opening_tag' => true,

      /*
      |----------------------------------------------------------------------
      | Cast Casing
      |----------------------------------------------------------------------
      |
      | Cast should be written in lower case.
      |
      */
      'lowercase_cast' => true,

      /*
      |----------------------------------------------------------------------
      | PHP Keyword Casing
      |----------------------------------------------------------------------
      |
      | The PHP constants `true`, `false`, and `null` MUST be in lower case.
      | PHP keywords MUST be in lower case.
      | Magic constants should be referred to using the correct casing.
      |
      */
      'lowercase_constants' => true,
      'lowercase_keywords' => true,
      'magic_constant_casing' => true,

      /*
      |----------------------------------------------------------------------
      | Method Argument Spacing
      |----------------------------------------------------------------------
      |
      | In method arguments and method call, there MUST NOT be a space before
      | each comma and there MUST be one space after each comma. Argument
      | lists MAY be split across multiple lines, where each subsequent line
      | is indented once. When doing so, the first item in the list MUST be
      | on the next line, and there MUST be only one argument per line.
      |
      */
      'method_argument_space' => [
        'ensure_fully_multiline' => true,
        'keep_multiple_spaces_after_comma' => false,
      ],

      /*
      |----------------------------------------------------------------------
      | Method Chaining Indentation
      |----------------------------------------------------------------------
      |
      | Method chaining MUST be properly indented. Method chaining with
      | different levels of indentation is not supported.
      |
      */
      'method_chaining_indentation' => true,

      /*
      |----------------------------------------------------------------------
      | DocBlock Tags
      |----------------------------------------------------------------------
      |
      | DocBlocks must start with two asterisks, multiline comments must start
      | with a single asterisk, after the opening slash. Both must end with a
      | single asterisk before the closing slash.
      |
      */
      'multiline_comment_opening_closing' => true,

      /*
      |----------------------------------------------------------------------
      | Semicolon Whitespace
      |----------------------------------------------------------------------
      |
      | Forbid multi-line whitespace before the closing semicolon or move the
      | semicolon to the new line for chained calls.
      |
      | Single-line whitespace before closing semicolon are prohibited.
      |
      */
      'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
      ],
      'no_singleline_whitespace_before_semicolons' => true,

      /*
      |----------------------------------------------------------------------
      | Native Function Casing
      |----------------------------------------------------------------------
      |
      | Function defined by PHP should be called using the correct casing.
      |
      */
      'native_function_casing' => true,

      /*
      |----------------------------------------------------------------------
      | Native Function Casing
      |----------------------------------------------------------------------
      |
      | All instances created with new keyword must be followed by braces.
      |
      */
      'new_with_braces' => true,

      /*
      |----------------------------------------------------------------------
      | Alternative Syntax
      |----------------------------------------------------------------------
      |
      | Replace control structure alternative syntax to use braces.
      |
      */
      'no_alternative_syntax' => true,

      /*
      |----------------------------------------------------------------------
      | Class Opening Blank Line
      |----------------------------------------------------------------------
      |
      | There should be no empty lines after class opening brace.
      |
      */
      'no_blank_lines_after_class_opening' => false,

      /*
      |----------------------------------------------------------------------
      | PHPDoc Closing Blank Line
      |----------------------------------------------------------------------
      |
      | There should not be blank lines between docblock and the documented
      | element.
      |
      */
      'no_blank_lines_after_phpdoc' => true,

      /*
      |----------------------------------------------------------------------
      | Namespace Preceeding Blank Line
      |----------------------------------------------------------------------
      |
      | There should be no blank lines before a namespace declaration.
      |
      */
      'no_blank_lines_before_namespace' => false,

      /*
      |----------------------------------------------------------------------
      | Switch-case Fallthrough Comment
      |----------------------------------------------------------------------
      |
      | There must be a comment when fall-through is intentional in a
      | non-empty case body.
      |
      */
      'no_break_comment' => [
        'comment_text' => 'no break',
      ],

      /*
      |----------------------------------------------------------------------
      | PHP Closing Tag
      |----------------------------------------------------------------------
      |
      | The closing ?> tag MUST be omitted from files containing only PHP.
      |
      */
      'no_closing_tag' => true,

      /*
      |----------------------------------------------------------------------
      | Empty Comments
      |----------------------------------------------------------------------
      |
      | There should not be any empty comments and/or PHPDoc blocks.
      |
      */
      'no_empty_comment' => true,
      'no_empty_phpdoc' => true,

      /*
      |----------------------------------------------------------------------
      | Empty Statements
      |----------------------------------------------------------------------
      |
      | Remove useless semicolon statements.
      |
      */
      'no_empty_statement' => true,

      /*
      |----------------------------------------------------------------------
      | Extra Blank Lines
      |----------------------------------------------------------------------
      |
      | Removes extra blank lines and/or blank lines following configuration.
      |
      */
      'no_extra_blank_lines' => [
        'tokens' => [
          'extra',
        ],
      ],

      /*
      |----------------------------------------------------------------------
      | Leading Slash – Imports
      |----------------------------------------------------------------------
      |
      | Remove leading slashes in use clauses.
      |
      */
      'no_leading_import_slash' => true,

      /*
      |----------------------------------------------------------------------
      | Leading Whitespace – Namespaces
      |----------------------------------------------------------------------
      |
      | The namespace declaration line shouldn't contain leading whitespace.
      |
      */
      'no_leading_namespace_whitespace' => true,

      /*
      |----------------------------------------------------------------------
      | Fat-arrow Multiline Whitespace
      |----------------------------------------------------------------------
      |
      | Operator `=>` should not be surrounded by multi-line whitespaces.
      |
      */
      'no_multiline_whitespace_around_double_arrow' => true,

      /*
      |----------------------------------------------------------------------
      | Null Property Initialization
      |----------------------------------------------------------------------
      |
      | Properties MUST not be explicitly initialized with null.
      |
      */
      'no_null_property_initialization' => false,

      /*
      |----------------------------------------------------------------------
      | Casting – Shorthand
      |----------------------------------------------------------------------
      |
      | Short cast bool using double exclamation mark should not be used.
      | Cast (boolean) and (integer) should be written as (bool) and (int),
      | (double) and (real) as (float).
      |
      */
      'no_short_bool_cast' => true,
      'short_scalar_cast' => true,

      /*
      |----------------------------------------------------------------------
      | Short Tags – Echo
      |----------------------------------------------------------------------
      |
      | Replace short-echo <?= with long format <?php echo syntax.
      |
      */
      'no_short_echo_tag' => true,

      /*
      |----------------------------------------------------------------------
      | Offset Brace Spaces
      |----------------------------------------------------------------------
      |
      | There MUST NOT be spaces around offset braces.
      |
      */
      'no_spaces_around_offset' => [
        'positions' => ['inside', 'outside'],
      ],

      /*
      |----------------------------------------------------------------------
      | Parenthesis Spaces
      |----------------------------------------------------------------------
      |
      | There MUST NOT be a space after the opening parenthesis. There MUST
      | NOT be a space before the closing parenthesis.
      |
      */
      'no_spaces_inside_parenthesis' => true,

      /*
      |----------------------------------------------------------------------
      | Trailing Commas
      |----------------------------------------------------------------------
      |
      | Remove trailing commas in list function calls.
      | PHP single-line arrays should not have trailing comma.
      |
      */
      'no_trailing_comma_in_list_call' => true,
      'no_trailing_comma_in_singleline_array' => true,

      /*
      |----------------------------------------------------------------------
      | Trailing Whitespace
      |----------------------------------------------------------------------
      |
      | Remove trailing whitespace at the end of non-blank lines.
      | There MUST be no trailing spaces inside comment or PHPDoc.
      | Remove trailing whitespace at the end of blank lines.
      |
      */
      'no_trailing_whitespace' => true,
      'no_trailing_whitespace_in_comment' => true,
      'no_whitespace_in_blank_line' => true,

      /*
      |----------------------------------------------------------------------
      | Final Methods
      |----------------------------------------------------------------------
      |
      | A final class must not have final methods.
      |
      */
      'no_unneeded_final_method' => true,

      /*
      |----------------------------------------------------------------------
      | Unused Imports
      |----------------------------------------------------------------------
      |
      | Unused use statements must be removed.
      |
      */
      'no_unused_imports' => true,

      /*
      |----------------------------------------------------------------------
      | Useless Returns
      |----------------------------------------------------------------------
      |
      | There MUST NOT be an empty return statement at the end of a function.
      |
      */
      'no_useless_return' => true,

      /*
      |----------------------------------------------------------------------
      | Logical NOT Operator
      |----------------------------------------------------------------------
      |
      | Logical NOT operators (!) MUST have leading and trailing whitespaces.
      | Logical NOT operators (!) should have one trailing whitespace.
      |
      */
      'not_operator_with_space' => false,
      'not_operator_with_successor_space' => false,

      /*
      |----------------------------------------------------------------------
      | Logical and/or Operators
      |----------------------------------------------------------------------
      |
      | Use && and || logical operators instead of and and or.
      |
      */
      'logical_operators' => false,

      /*
      |----------------------------------------------------------------------
      | Object Operator
      |----------------------------------------------------------------------
      |
      | There should not be space before or after object T_OBJECT_OPERATOR ->.
      |
      */
      'object_operator_without_whitespace' => true,

      'ordered_class_elements' => [
          'sortAlgorithm' => 'alpha',
          'order' => [
              'use_trait',
              'constant',
              'constant_public',
              'constant_protected',
              'constant_private',
              'public',
              'protected',
              'private',
              'property',
              'property_static',
              'property_public_static',
              'property_protected_static',
              'property_private_static',
              'property_public',
              'property_protected',
              'property_private',
              'construct',
              'destruct',
              'magic',
              'phpunit',
              'method',
              'method_static',
              'method_public_static',
              'method_protected_static',
              'method_private_static',
              'method_public',
              'method_protected',
              'method_private',
          ],
      ],

      /*
      |----------------------------------------------------------------------
      | Import Order
      |----------------------------------------------------------------------
      |
      | Ordering use statements.
      |
      */
      'ordered_imports' => [
        'importsOrder' => null,
        'sortAlgorithm' => 'alpha',
      ],

      // TODO: PHPUnit Rules
      // TODO: PHPDoc Rules

      /*
      |----------------------------------------------------------------------
      | Member Accessibility & Visibility
      |----------------------------------------------------------------------
      |
      | Converts protected properties and methods to private where possible.
      | Visibility MUST be declared on all properties and methods; abstract
      | and final MUST be declared before the visibility; static MUST be
      | declared after the visibility.
      |
      */
      'protected_to_private' => true,
      'visibility_required' => [
        'elements' => [
          'property',
          'method',
        ],
      ],

      /*
      |----------------------------------------------------------------------
      | Return Type Declaration
      |----------------------------------------------------------------------
      |
      | There should be one or no space before colon, and one space after it
      | in return type declarations, according to configuration.
      |
      */
      'return_type_declaration' => [
          'space_before' => 'none',
      ],

      /*
      |----------------------------------------------------------------------
      | Simplified Null/Void Return
      |----------------------------------------------------------------------
      |
      | A return statement wishing to return void should not return null.
      |
      */
      'simplified_null_return' => true,

      /*
      |----------------------------------------------------------------------
      | EOF Empty Line
      |----------------------------------------------------------------------
      |
      | A PHP file without end tag MUST end with a single empty line feed.
      |
      */
      'single_blank_line_at_eof' => true,

      /*
      |----------------------------------------------------------------------
      | Single-line Comment Style
      |----------------------------------------------------------------------
      |
      | Single-line comments and multi-line comments with only one line of
      | actual content should use the // syntax.
      |
      */
      // 'single_line_comment_style' => [
      // 	'comment_types' => [
      // 		'asterisk',
      // 		'hash',
      // 	],
      // ],

      /*
      |----------------------------------------------------------------------
      | Switch Case Colon
      |----------------------------------------------------------------------
      |
      | A case should be followed by a colon and not a semicolon.
      | Removes extra spaces between colon and case value.
      |
      */
      'switch_case_semicolon_to_colon' => true,
      'switch_case_space' => true,

      /*
      |----------------------------------------------------------------------
      | Ternary Operator
      |----------------------------------------------------------------------
      |
      | Standardize spaces around ternary operator.
      | Use null coalescing operator ?? where possible. Requires PHP >= 7.0.
      |
      */
      'ternary_operator_spaces' => true,
      'ternary_to_null_coalescing' => true,

      /*
      |----------------------------------------------------------------------
      | Yoda Conditions
      |----------------------------------------------------------------------
      |
      | Write conditions in Yoda style (object –> subject –> verb). E.g.,
      | "When nine hundred years old you reach, look as good you will not."
      |
      */
      'yoda_style' => [
          'always_move_variable' => false,
          'equal' => true,
          'identical' => true,
          'less_and_greater' => null,
      ],
    ]);
