<?php


/**
 * 處理樹形數據
 * @param array  $data
 * @param string $parent
 * @return array
 */
function dealTree( array $data, string $parent = "p_id" ): array
{
    $newData = [];
    foreach ( $data as $item ) {
        $newData[ $item[ $parent ] ][] = $item;
    }

    return $newData;
}

/**
 * 獲取樹形數據
 * @param array  $data
 * @param int    $parent_id
 * @param string $children
 * @param string $pk
 * @return array
 */
function getTree( array $data, int $parent_id = 0, string $children = "children", string $pk = "id" ): array
{
    $newData = [];
    if ( empty( $data ) ) {
        return [];
    }
    foreach ( $data[ $parent_id ] as $item ) {
        if ( array_key_exists( $item[ $pk ], $data ) ) {
            $item[ $children ] = getTree( $data, $item[ $pk ] );
        }
        $newData[] = $item;
    }

    return $newData;
}
