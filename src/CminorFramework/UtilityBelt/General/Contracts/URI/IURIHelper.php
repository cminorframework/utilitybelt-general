<?php
namespace CminorFramework\UtilityBelt\General\Contracts\URI;

/**
 *
 * URI helper class to mess with URIs and URLs
 *
 * @package CminorFramework
 * @subpackage UtilityBelt
 * @version 0.2
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
interface IURIHelper
{

    /**
     * Returns a string containg the parameters of the request uri
     *
     * @since 0.1
     * @param string $request_uri_string
     * @return string
     */
    public function getURIParameterStringLegacy( $request_uri_string );

    /**
     * Cleans a url from the posted parameters
     * @param string $request_uri_string
     * @return <NULL, string>
     */
    public function cleanURLStringFromParameters( $request_uri_string );

    /**
     * Parses a url and returns the parameters in an associative array
     * @param unknown $request_uri_string
     * @return unknown
     */
    public function getURIParameterArrayLegacy( $request_uri_string );

    /**
     * Parses a parameter array and builds a url string of those parameters
     * @param array $parameter_array
     * @return NULL|string
     */
    public function buildURLParameterStringFromParameterArray( $parameter_array );

    /**
     * Builds a parameter string from a parameter array, additionaly excluding some parameters
     * @param array $parameter_array
     * @param array $excluded_parameters_array
     * @return string
     */
    public function buildURLParameterStringFromParameterArrayExcluding( $parameter_array, $excluded_parameters_array );

    /**
     * Excludes the given parameter names from the parameter array
     * @param array $parameter_array
     * @param array $excluded_parameters_array
     * @return multitype:|array
     */
    public function excludeParametersFromParameterArray( $parameter_array, $excluded_parameters_array );

}