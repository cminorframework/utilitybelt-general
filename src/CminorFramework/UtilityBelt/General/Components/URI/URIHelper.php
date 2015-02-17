<?php
namespace CminorFramework\UtilityBelt\General\Components\URI;

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
class URIHelper
{

    /**
     * Returns a string containg the parameters of the request uri
     *
     * @since 0.1
     * @param string $request_uri_string
     * @return string
     */
    public function getURIParameterStringLegacy( $request_uri_string )
    {

        if ( ! $request_uri_string ) {
            return null;
        }

        //get the parameters query string
        $query = null;
        if( $parameters = parse_url($request_uri_string) ){
            $query = isset($parameters['query']) ? $parameters['query'] : null;
        }

        return $query;

    }

    /**
     * Cleans a url from the posted parameters
     * @param string $request_uri_string
     * @return <NULL, string>
     */
    public function cleanURLStringFromParameters( $request_uri_string )
    {

        // first get the parameters string
        $parameter_string = null;
        if ( $parameter_string = $this->getURIParameterStringLegacy( $request_uri_string ) ) {
            $parameter_string = '?' . $parameter_string;
        }

        // replace from the original url
        $cleaned_url = str_replace( $parameter_string, '', $request_uri_string );

        if ( $cleaned_url == '/' ) {
            $cleaned_url = null;
        }

        return $cleaned_url;

    }

    /**
     * Parses a url and returns the parameters in an associative array
     * @param unknown $request_uri_string
     * @return unknown
     */
    public function getURIParameterArrayLegacy( $request_uri_string )
    {

        parse_str( $request_uri_string, $output );

        return $output;

    }

    /**
     * Parses a parameter array and builds a url string of those parameters
     * @param array $parameter_array
     * @return NULL|string
     */
    public function buildURLParameterStringFromParameterArray( $parameter_array )
    {

        if ( ! $parameter_array ) {
            return null;
        }

        return http_build_query($parameter_array);

    }

    /**
     * Builds a parameter string from a parameter array, additionaly excluding some parameters
     * @param array $parameter_array
     * @param array $excluded_parameters_array
     * @return string
     */
    public function buildURLParameterStringFromParameterArrayExcluding( $parameter_array, $excluded_parameters_array )
    {

        if ( ! $parameter_array ) {
            return null;
        }

        $parameter_array = $this->excludeParametersFromParameterArray($parameter_array, $excluded_parameters_array);

        return $this->buildURLParameterStringFromParameterArray( $parameter_array );

    }

    /**
     * Excludes the given parameter names from the parameter array
     * @param array $parameter_array
     * @param array $excluded_parameters_array
     * @return multitype:|array
     */
    public function excludeParametersFromParameterArray( $parameter_array, $excluded_parameters_array )
    {

        if ( ! $parameter_array ) {
            return array();
        }

        if ( $excluded_parameters_array ) {
            foreach ( $excluded_parameters_array as $excluded_parameter ) {
                if ( isset( $parameter_array[$excluded_parameter] ) ) {
                    unset( $parameter_array[$excluded_parameter] );
                }
            }
        }

        return $parameter_array;

    }

}