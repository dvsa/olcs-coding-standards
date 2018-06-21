<?php


namespace Dvsa\Sniffs\CS;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class ToggleInterfaceSniff implements Sniff
{

    public function register()
    {
        return [
            T_CLASS

        ];
    }

    /**
     * process the tokens to determine if extends AbstractCommandHandler and
     * has Interface.
     * @param File $phpcsFile
     * @param int  $stackPtr
     *
     * @return int|void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $interface = $phpcsFile->findImplementedInterfaceNames($stackPtr)[0];
        $hasToggleInterface = $interface === 'ToggleRequiredInterface' || $interface === 'ToggleAwareInterface';
        $nameSpacePosition = $phpcsFile->findPrevious([T_NAMESPACE], $stackPtr);
        $nameSpaceToken = $tokens[$nameSpacePosition];
        $inPermitNamespace = preg_match('#CommandHandler\Permit | QueryHandler\Permit#',
            trim($phpcsFile->getTokensAsString($nameSpaceToken['column'], $nameSpaceToken['length'])));
        $extends = $phpcsFile->findNext([T_EXTENDS], $stackPtr);
        if($extends) {
            $parentClassNamePosition = $phpcsFile->findNext([T_STRING], $extends);
            // File has all the tokens, so we get the one with name
            $parentClassNameToken = $phpcsFile->getTokens()[$parentClassNamePosition];
            if ($inPermitNamespace && !$hasToggleInterface && $parentClassNameToken['content'] === 'AbstractCommandHandler') {
                $error = 'Toggle Interface is required for CommandHandlers in this namespace';
                $data = array(trim($tokens[$stackPtr]['content']));
                $phpcsFile->addError($error, $stackPtr, 'Interface', $data);

            }
        }
    }
}
